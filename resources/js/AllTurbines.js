
async function getTurbines() {

    await fetch('/turbines', {
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

                const owner = document.createElement("div");
                fetch('/users/' + data[i]['user_id'], {
                    method: "GET",
                    headers: {
                        "Content-type": "application/json",
                        Accept: "application/json"
                    }
                }).then(res => res.json())
                    .then(data => {
                        owner.innerHTML = "Owner: " + data[0]['first_name'] + " " + data[0]['last_name'];
                    });
                cont.appendChild(owner);
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
                newCard.appendChild(cont);
                newCard.appendChild(cont2);
                element.appendChild(newCard);
            }
        });

}
