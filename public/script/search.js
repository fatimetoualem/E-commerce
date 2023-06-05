
function onInputSearch(event)
{
    const search = event.currentTarget.value;

    if (search.length < 2) {
        return;
    }
    const url = form.dataset.url + '?search=' + encodeURIComponent(search);
    // Enoie la requete au serveur
    fetch(url)
        //  recois la reponse de HTTP
        .then(function(response) {
            return response.json();
        })
        // récuperer les données du reponse
        .then(function(products){
            console.log(products)
            container.innerHTML = '';
            for (let product of products) {
                container.innerHTML += `<a href="/my_project_mvc/public/index.php/product?id=${product.idProduct}" class="resultSearch" id="resultSearch">
                                            <div class="imgSearchResult">
                                                <img src="/my_project_mvc/public/images/${product.image}"/>
                                            </div> 
                                            <div>
                                                <h2>${product.title}</h2>
                                                <p>${product.description}</p>
                                                <h3>${product.price} €</h3>
                                            </div>       
                                        </a>`;
                
            }
        });
}

const searchInput = document.getElementById('search');
const container = document.getElementById('container');

searchInput.addEventListener('input', onInputSearch);

function onSubmitForm(event){
    event.preventDefault();
}

const form = document.querySelector(".form");
form.addEventListener("submit", onSubmitForm);


// let resultSearch = document.querySelector(".resultSearch");

// const url = '/my_project_mvc/public/index.php/search?search=' + encodeURIComponent(search);