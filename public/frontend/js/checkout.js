window.onload = () => {
    axios.get('/get_cart')
    .then(res => {
        
        display_cart_items(res.data)    
        display_cart_item_to_checkout_page(res.data)   
        cart_delete()

        
    })
}




function display_cart_items(items){
            document.getElementsByClassName('count')[0].innerHTML = items.length
            document.getElementsByClassName('count')[1].innerHTML = items.length

            if(!items.length){
                document.getElementsByClassName('cart')[0].innerHTML = `<img src="/frontend/images/empty_cart.png">`
                document.getElementsByClassName('cart')[1].innerHTML = `<img src="/frontend/images/empty_cart.png">`
                document.getElementsByClassName('cart-button')[0].style.display = 'none'
                document.getElementsByClassName('cart-button')[1].style.display = 'none'
                document.getElementsByClassName('main_checkout')[0].classList.add('d-none');
                document.getElementsByClassName('main_checkout')[0].classList.remove('d-block');
                document.getElementsByClassName('empty_cart')[0].classList.remove('d-none');
                return document.getElementsByClassName('empty_cart')[0].classList.add('d-block');
            }
           
            document.getElementsByClassName('cart-button')[1].style.display = 'block'
            document.getElementsByClassName('cart-button')[0].style.display = 'block'


            document.getElementsByClassName('cart')[0].innerHTML = ''
            items.forEach(value => {            
            document.getElementsByClassName('cart')[0].innerHTML += `<tr>
                                                            <td>
                                                                <img src="/images/product/${value.image}" width="32px" alt="">
                                                            </td>
                                                            <td>
                                                                <p>${value.name}</p>
                                                                <p>${value.total} taka</p>
                                                                <p>${value.qty}x</p>
                                                            </td>
                                                            <td>
                                                                <button class="cartDelete" data-id="${value.id}"><i data-id="${value.id}" class="fas fa-times"></i></button>
                                                            </td>
                                                        </tr>`
        })

            
            document.getElementsByClassName('cart')[1].innerHTML = ''
            items.forEach(value => {
            document.getElementsByClassName('cart')[1].innerHTML += `<tr>
                                                            <td>
                                                                <img src="/images/product/${value.image}" width="32px" alt="">
                                                            </td>
                                                            <td>
                                                                <p>${value.name}</p>
                                                                <p>${value.total} taka</p>
                                                                <p>${value.qty}x</p>
                                                            </td>
                                                            <td>
                                                                <button class="cartDelete" data-id="${value.id}"><i class="fas fa-times" data-id="${value.id}"></i></button>
                                                            </td>
                                                        </tr>`
        })

        

        cart_delete()
}


function cart_delete(){
    let delete_button = document.getElementsByClassName('cartDelete');
    for(let i in delete_button){
        delete_button[i].onclick = e => {
            
            axios.delete(`/delete_cart/${e.target.dataset.id}`).then(res => {
              
                if(res.data){
                    swal('','Cart updated!','success');
                    display_cart_items(res.data)
                    display_cart_item_to_checkout_page(res.data)
                    cart_delete()
                }
            })
        }
    }
}




function display_cart_item_to_checkout_page(item){
    document.getElementById('cart_item_wrapper').innerHTML = ''

    if(!item.length){
        document.getElementsByClassName('main_checkout')[0].classList.add('d-none');
        document.getElementsByClassName('main_checkout')[0].classList.remove('d-block');
        document.getElementsByClassName('empty_cart')[0].classList.add('d-block');
        return document.getElementsByClassName('empty_cart')[0].classList.remove('d-none');
    }

    document.getElementsByClassName('main_checkout')[0].classList.add('d-block');
    document.getElementsByClassName('main_checkout')[0].classList.remove('d-none');
    document.getElementsByClassName('empty_cart')[0].classList.add('d-none');
    document.getElementsByClassName('empty_cart')[0].classList.remove('d-block');


    item.forEach(value => {
        document.getElementById('cart_item_wrapper').innerHTML += ` 
                    <tr>
                        <td>
                            <img src="/images/product/${value.image}" width="32px" alt="">
                        </td>                           
                        <td>${value.name}</td>
                        <td>${value.price} tk * <input type="number" min="1" value="${value.qty}"> <button onclick="return false" class="btn-sm btn-warning">update</button></td>
                        <td>${value.total} tk</td>
                        <td>                         
                            
                            <span class="btn-sm btn-danger cartDelete" data-id="${value.id}" style="cursor:pointer;">Delete</span>
                        </td>
                    </tr>
        `
    })
}

