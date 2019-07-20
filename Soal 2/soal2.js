// check username function
function checkUsername(username) {
  // regex pattern untuk username hanya boleh huruf kecil tanpa angka dan harus terdiri dari 8 karakter;
  const usernamePattern = /^[a-z]{8,8}$/;

  if(usernamePattern.test(username)){
    console.log('valid');
  } else {
    console.log('invalid');
  }
}

// the result should be 'invalid'
checkUsername('Vladimir');


// check email function
function checkEmail(email) {
  // regex pattern untuk email yg valid ketika hanya ada @ dan hurif kecil.

  const emailPattern = /^[a-z]+@[a-z]+/;

  if(emailPattern.test(email)){
    console.log('valid');

  } else {
    console.log('invalid');
  }
}

//the result should be 'valid'
checkEmail('kukuruyuk@gmail.com');