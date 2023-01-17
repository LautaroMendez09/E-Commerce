
const productInfoDirection = document.querySelectorAll('.productInfoDirection');

productInfoDirection.forEach(element =>{
    element.addEventListener('click', () =>{
        
        id = element.parentElement.parentElement.children[0].value;
        fetch('http://localhost/proyecto3BCFinal/category/getItemByIDGET?id=' + id)
        .then(response =>{
            return response.text();
        })
        .then(data =>{
            window.location.href = 'http://localhost/proyecto3BCFinal/category/getItemByIDGET?id=' + id;
        });
    });
});
const submenuCategories = document.querySelectorAll('.categoryClick');

submenuCategories.forEach(element =>{
    element.addEventListener('click', () =>{

        let category = element.id;

        showItemsByCategory(category)
    });
});

const showItemsByCategory = category =>{
    console.log(category);
    fetch('http://localhost/proyecto3BCFinal/Category/Categoria?category=' + category + '&pagina=1')
    .then(response =>{
        return response.text();
    })
    .then(data =>{
        window.location.href = 'http://localhost/proyecto3BCFinal/Category/Categoria?category=' + category + '&pagina=1';

    });
};


