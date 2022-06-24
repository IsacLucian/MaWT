// async function validateRegister() {
//
//     var first_name = document.forms.RegForm.first_name.value;
//     var last_name = document.forms.RegForm.last_name.value;
//     var email = document.forms.RegForm.email.value;
//     var password = document.forms.RegForm.password.value;
//     var confirm_password = document.forms.RegForm.confirm_password.value;
//
//     var regEmail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//     var regName = /^[a-zA-Z ]+$/;
//
//     if (first_name === "" || !regName.test(first_name)) {
//
//         return false;
//     }
//
//     if (last_name === "" || !regName.test(last_name)) {
//
//         return false;
//     }
//
//     if (email === "" || !regEmail.test(email)) {
//
//         return false;
//     }
//     //
//     // if (password === "") {
//     //     return false;
//     // }
//     //
//     // if (password.length < 8) {
//     //     return false;
//     // }
//     //
//     // if (password !== confirm_password) {
//     //     return false;
//     // }
//
//     const response = await fetch('http://mawt.local/users/' + email);
//
//     response.then(data => data.json())
//         .then(res => {
//             console.log(res);
//             if (res.length > 0)
//                 return false;
//             return true;
//         })
//         .catch(e => console.log(e));
//
//     console.log(response);
//     return false;
// }
//
// // async function postData({url, data}) {
// //      const obj = Object.fromEntries(data.entries());
// //      delete obj['confirm_password'];
// //
// //      const jsonData = JSON.stringify(obj);
// //
// //      await fetch(url, {
// //          method: "POST",
// //              headers: {
// //                  "Content-type": "application/json",
// //                  Accept: "application/json"
// //
// //              },
// //          body: jsonData
// //      }).then(res => console.log(res));
// //
// // }
// //
// // async function handleSubmit(event) {
// //     event.preventDefault();
// //
// //     if(!validateRegister()) {
// //         return ;
// //     }
// //
// //     const form = event.currentTarget;
// //     const url = "/users/post";
// //
// //     try {
// //         const data = new FormData(form);
// //         await postData({url, data});
// //
// //     } catch (error) {
// //         console.log(error.message);
// //     }
// // }
// //
// // const form = document.getElementById("RegForm");
// // form.addEventListener("submit", handleSubmit);
//
