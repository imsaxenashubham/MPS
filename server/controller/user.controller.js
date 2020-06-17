const mongoose = require('mongoose');
var nodemailer = require('nodemailer');
var async=require('async');
var crypto =require('crypto');
// const passport = require('passport');
// const _ = require('lodash');

const User = mongoose.model('User');

var transporter = nodemailer.createTransport({
    service: 'gmail',
    auth: {
      user: 'ravinalawade5@gmail.com',
      pass: 'Acbl@1234'
    }
  });

module.exports.register = (req, res, next) => {
    var user = new User();
    user.fullName = req.body.fullname;
    user.email = req.body.email;
    user.password = req.body.password;
    user.reset_password_token=undefined;
    user.reset_password_expires=undefined;
    user.save((err, doc) => {
        if (!err)
            res.send(doc);
        else {
            if (err.code == 11000)
                res.status(422).send(['Duplicate email adrress found.']);
            else
                return next(err);
        }

    });
}

module.exports.login=(req,res,next)=>{
    var email=req.body.email;
    var password=req.body.password;
    User.findOne({email:email,password:password},
        (err,user)=>{
            if (!user)
                return res.status(404).json({ status: false, message: 'User record not found.' });
            else
                return res.status(200).json({ status: true, user : user });
        }
    );
}

module.exports.email_userid=(req,res,next)=>{
    async.waterfall([
        function(done) {
          User.findOne({
            email: req.body.email
          }).exec(function(err, user) {
            if (user) {
              done(err, user);
            } else {
              done('User not found.');
            }
          });
        },
        function(user, done) {
          // create the random token
          crypto.randomBytes(20, function(err, buffer) {
            var token = buffer.toString('hex');
            done(err, user, token);
          });
        },
        function(user, token, done) {
          User.findByIdAndUpdate({ _id: user._id }, { reset_password_token: token, reset_password_expires: Date.now() + 86400000 }, { upsert: true, new: true }).exec(function(err, new_user) {
            done(err, token, new_user);
          });
        },
        function(token, user, done) {
          var data = {
            to: user.email,
            from: "ravinalawade5@gmail.com",
            // template: 'forgot-password-email',
            subject: 'Password help has arrived!',
            html:"Hello"+user.fullName.split(' ')[0]+"</br>Your password link is:"+'http://localhost:3000/api/reset_password?token=' + token,
            // context: {
            //   url: 'http://localhost:3000/auth/reset_password?token=' + token,
            //   name: user.fullName.split(' ')[0]
            // }
          };
    
          transporter.sendMail(data, function(err) {
            if (!err) {
              return res.json({ message: 'Kindly check your email for further instructions' });
            } else {
              return done(err);
            }
          });
        }
      ], function(err) {
        return res.status(422).json({ message: err });
      });
    };

module.exports.updatepassword=(req,res,next)=>{
    console.log(req.query.token,req.body)
    User.findOne({
        reset_password_token: req.query.token,
        reset_password_expires: {
          $gt: Date.now()
        }
      }).exec(function(err, user) {
        if (!err && user) {
          if (req.body.newPassword === req.body.verifyPassword) {
            user.password = req.body.newPassword;
            user.reset_password_token = undefined;
            user.reset_password_expires = undefined;
            user.save(function(err) {
              if (err) {
                  console.log("in if")
                return req.status(422).send({
                  message: err
                });
              } else {
                console.log("in else")
                var data = {
                  to: user.email,
                  from: 'ravinalawade5@gmail.com',
                //   template: 'reset-password-email',
                  subject: 'Password Reset Confirmation',
                  html:'Your password has been changed'
                //   context: {
                //     name: user.fullName.split(' ')[0]
                //   }
                };
    
                transporter.sendMail(data, function(err) {
                  if (!err) {
                    console.log("in email if")
                    return res.json({ message: 'Password reset' });
                  } else {
                    return done(err);
                  }
                });
              }
            });
          } else {
            return res.status(422).send({
              message: 'Passwords do not match'
            });
          }
        } else {
          return res.status(400).send({
            message: 'Password reset token is invalid or has expired.'
          });
        }
      });
}
