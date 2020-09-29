window.onload = () => {
    axios.get('/get_cart')
    .then(res => {
        
        display_cart_items(res.data)    
        display_cart_item_to_checkout_page(res.data)   
        cart_delete()
        update_checkout_quantiy()
        total_price(res.data)
        

        
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
                    update_checkout_quantiy()
                    total_price(res.data)
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
                        <td>${value.price} tk * <input type="number" min="1" value="${value.qty}" class="update_value" data-id="${value.id}" style="width:60px;border:2px solid #d92173;border-radius:5px;font-weight:bold;margin-left:5px;"> <span class="update_button btn-sm" style="background:#d92173;font-weight:bold;color:#fff;cursor:pointer;">update</span></td>
                        <td>${value.total} tk</td>
                        <td>                         
                            
                            <span class="btn-sm btn-danger cartDelete" data-id="${value.id}" style="cursor:pointer;">Delete</span>
                        </td>
                    </tr>
        `
    })
}



function update_checkout_quantiy(){
    let update_value = document.getElementsByClassName('update_value')
    let update_button = document.getElementsByClassName('update_button')

    for(let i in update_button){
        update_button[i].onclick = () => {
            let qty = update_value[i].value
            let id = update_value[i].dataset.id

            axios.put(`/update_cart/${id}`, {qty})
            .then(res => {
                display_cart_items(res.data)    
                display_cart_item_to_checkout_page(res.data)   
                cart_delete()
                update_checkout_quantiy()
                total_price(res.data)
            })

        }
    }
}



function total_price(items=Array){
    let total = 100
    items.forEach(value => {
        total+= value.total
    })

    return document.getElementById('total_price').innerHTML = total
}


const process_cart_button = document.getElementById('process_cart')
process_cart_button.addEventListener('click', ()=> {
    axios.get('/get_cart')
    .then(res => {      
        cart_process(res.data)        
    })
})

function cart_process(items=Array){
    document.getElementById('cart_detail').innerHTML = ' '
    items.forEach(value => {
        document.getElementById('cart_detail').innerHTML += `
            <input type="hidden" value="${value.id}" name="product_id[]" />
            <input type="hidden" value="${value.qty}" name="product_qty[]" />
        `
    })

}
