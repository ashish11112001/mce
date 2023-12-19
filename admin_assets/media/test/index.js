var axios = require("axios");
setInterval(function () {
  console.log("test start");
axios({
  url: 'http://shrikrishanapackers.com/mail.php',
  headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
  data: `type=1&Shifting-From=Earth&Shifting-To=Paatal&service=6&Select=2023-04-12&Name=The Loard Krishna&Contact=9999999999`
})
.then(function(response) {
  console.log(response.status)
})
.catch(function(error) {
  console.log(error)
});
console.log("test end");
}, 1000);
