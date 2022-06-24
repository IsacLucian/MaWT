// async function login({url, data}) {
//     const obj = Object.fromEntries(data.entries());
//     const jsonData = JSON.stringify(obj);
//
//     await fetch(url, {
//         method: "POST",
//         headers: {
//             "Content-type": "application/json",
//             Accept: "application/json"
//
//         },
//         body: jsonData
//     }).then(res => console.log(res));
//
// }
//
// async function handleSubmit(event) {
//     event.preventDefault();
//     const email = document.forms.RegForm.email.value;
//     const password = document.forms.RegForm.password.value;
//     const form = event.currentTarget;
//     const url = "/users/" + email;
//
//     try {
//
//         // await fetch(url, {
//         //     method: "GET",
//         //     headers: {
//         //         "Content-type": "application/json",
//         //         Accept: "application/json"
//         //
//         //     }
//         // }).then(res => res.json())
//         //     .then(data => {
//         //         if(data[0].password === password)
//         //
//         //     });
//
//     } catch (error) {
//         console.log(error.message);
//     }
// }
//
// const form = document.getElementById("RegForm");
// form.addEventListener("submit", handleSubmit);