window.onload = () => {
    axios.get('/get_cart')
    .then(res => {
        
        display_cart_items(res.data)       

        
    })
}


//add to cart functionality
$(document).ready(function(){
    
    $(".addToCart").click(function(e){   

      
        let id = e.target.dataset.id
        
   
        axios.post('/add_to_cart', {id}).then(res => {
            swal('','Product added to the cart','success');
            display_cart_items(res.data)
            
        })
        
        document.getElementsByClassName('cart-button')[0].style.display = 'block'
        document.getElementsByClassName('cart-button')[1].style.display = 'block'
        
        
    })
})

function display_cart_items(items){
            document.getElementsByClassName('count')[0].innerHTML = items.length
            document.getElementsByClassName('count')[1].innerHTML = items.length

            if(!items.length){
                document.getElementsByClassName('cart')[0].innerHTML = `<img src="/frontend/images/empty_cart.png">`
                document.getElementsByClassName('cart')[1].innerHTML = `<img src="/frontend/images/empty_cart.png">`
                document.getElementsByClassName('cart-button')[0].style.display = 'none'
                return document.getElementsByClassName('cart-button')[1].style.display = 'none'
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
                    cart_delete()
                }
            })
        }
    }
}

