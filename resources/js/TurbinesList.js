
async function getTurbines(user_id) {

    await fetch('/turbines/user/' + user_id, {
        method: "GET",
        headers: {
            "Content-type": "application/json",
            Accept: "application/json"
        },
    }).then(res => res.json())
        .then(data => {
            // console.log(data);
            for(const i in data) {

                const element = document.getElementById("list");
                const newCard = document.createElement("div");
                newCard.className = "card";
                newCard.id = "card" + data[i]['id'];

                const cont = document.createElement("div");
                cont.className = "container";
                const cont2 = document.createElement("div");
                cont.className = "container";

                const index = document.createElement("h3");

                index.innerHTML = '#' + (parseInt(i) + 1);
                cont.appendChild(index);

                const nume = document.createTextNode(" " + data[i]['name'] + " ");
                cont.appendChild(nume);

                const stat = document.createElement('div');
                stat.innerHTML = data[i]['status'];
                stat.className = data[i]['status'];
                cont.appendChild(stat);

                const sub = document.createElement("button");
                sub.type = "submit";
                sub.innerHTML = "VIEW";
                sub.id = "view" + i;
                sub.addEventListener("click", function () {
                    window.location.href = '/map/' + data[i]['id'];
                });
                cont2.appendChild(sub);

                const rem = document.createElement("button");
                rem.innerHTML = "DELETE";
                rem.type = "submit";
                rem.addEventListener("click", function () {
                     document.getElementById("card" + data[i]['id']).innerHTML = "";
                     fetch('/turbines/delete/' + data[i]['id'], {
                         method: "DELETE",
                         headers: {
                             "Content-type": "application/json",
                             Accept: "application/json"
                         },
                     }).then(res => res.text())
                         .then(data => console.log(data));
                });

                cont2.appendChild(rem);
                newCard.appendChild(cont);
                newCard.appendChild(cont2);
                element.appendChild(newCard);
            }
        });

}
