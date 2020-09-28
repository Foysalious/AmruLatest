@extends('backend.template.layout')

@section('body-content')
<!-- main content start -->
<div class="main-content">
    <div class="container-fluid">
        
        <!-- page indicator start -->
        <section class="page-indicator">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li>
                            <i class="fas fa-user"></i>
                        </li>
                        <li>
                            Supplier Management
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @if( session()->has('success') )
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congratulation!</strong> {{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                </div>
            </div>

            <!-- supplier information add row start -->
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('supplier.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>supplier name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label>supplier address</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                        <div class="form-group">
                            <label>supplier contact no.</label>
                            <input type="text" class="form-control" name="phone">
                        </div>
                        <div class="form-group">
                            <label>shop name</label>
                            <input type="text" class="form-control" name="shop">
                        </div>
                        <div class="d-none" id="form-kocukhet">
                            
                        </div>
                        <input type="submit" class="d-none" value="submit" id="suplier_submit">
                    </form>
                </div>
            </div>
            <!-- supplier information add row end -->

        </section>
        <!-- page indicator end -->

        <!-- dashbaord statistics seciton start -->
        <section class="statistics">

            <!-- manage row start -->
            <div class="row">
                
                <!-- all product list start -->
                <div class="col-md-6 col-12 table-responsive">
                    <h2 style="margin: 15px 0">all product list</h2>
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <td>select item</td>
                                <td>image</td>
                                <td>name</td>
                                <td>size</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $key => $product)
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input type="checkbox" data-name="{{$product->name}}" data-id="{{$product->id}}" class="form-check-input select_product">
                                    </div>
                                </th>
                                <td>
                                    <img src="{{ asset('images/product/'.$product->images[0]->image ) }}" class="img-fluid" width="50px" alt="">
                                </td>
                                <td>
                                    {{ $product->name }}
                                </td>
                                <td>
                                    {{ $product->size }} kg
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- all product list end -->

                <!-- selected product product list start -->
                <div class="col-md-6 col-12 table-responsive">
                    <h2 style="margin: 15px 0">selected product list</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>name</td>
                                <td>quantity</td>
                                <td>price</td>
                                <td>total price</td>
                            </tr>
                        </thead>
                        <tbody id="selectedProductDisplay">
                            
                        </tbody>
                    </table>

                    <!-- add row start -->
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-primary" onclick="return document.getElementById('suplier_submit').click();" >add</button>
                        </div>
                    </div>
                    <!-- add row end -->
                </div>
                <!-- selected product product list end -->

            </div>
            <!-- manage row end -->

            

        </section>
        <!-- dashbaord statistics seciton end -->

    </div>
</div>
<!-- main content end -->
@endsection

@section('js')
    <script>


        let select_product
        let selectedProduct = []

        
        function updateClassSelection(){

            select_product = document.getElementsByClassName('select_product')
            for(let i in select_product){
                select_product[i].onclick = e => {
                    if(e.target.checked){
                        selectedProduct.push({name: e.target.dataset.name, id: e.target.dataset.id, qty: 1, unit_price: 0, total: 0})
                    }else{
                        selectedProduct.filter((value, index) => {
                            if(value.id== e.target.dataset.id){
                                selectedProduct.splice(index, 1)
                            }
                        })
                    }

                    updateSelectedProductDisplay()
                    updateProductQuantity()
                    updateProductPrice()

                }
            }
        }

        function updateSelectedProductDisplay(){
            document.getElementById('selectedProductDisplay').innerHTML = ''
            selectedProduct.forEach(e => {
                document.getElementById('selectedProductDisplay').innerHTML += `
                    <tr data-id="${e.id}">
                        <td>
                            ${e.name}
                        </td>
                        <td>
                            <input type="number" min="1" class="quantity" value="${e.qty}" >
                        </td>
                        <td>
                            <input type="number" value="${e.unit_price}" class="price" min="1">
                        </td>
                        <td class="totalPrice">
                            ${e.total} tk
                        </td>
                    </tr>
                
                `
            })
        }


        function updateProductQuantity(){
            let quantity = document.getElementsByClassName('quantity')
            for( let x in quantity ){
                quantity[x].oninput = (e) => {
                    let tr = quantity[x].closest('tr').dataset.id
                    selectedProduct.filter((value, index) => {
                        if(value.id == tr){
                            selectedProduct[index].qty = parseFloat(e.target.value) || 0
                            let unit_price = parseFloat(selectedProduct[index].unit_price) || 0
                            selectedProduct[index].total = selectedProduct[index].qty * unit_price
                        }
                    })

                    updateTotalPrice()
                }
            }
        }

        function updateProductPrice(){
            let price = document.getElementsByClassName('price');
            for( let x in price ){
                price[x].oninput = (e) => {
                    let tr = price[x].closest('tr').dataset.id
                    selectedProduct.filter( (value, index) => {
                        if( value.id == tr ){

                            let unit_price = parseFloat(e.target.value) || 0
                            selectedProduct[index].unit_price = unit_price
                            
                            selectedProduct[index].total = selectedProduct[index].qty * unit_price
                           
                           
                        }
                    })

                    updateTotalPrice()
                }
            }
        }

        function updateTotalPrice(){
            let totalPrice = document.getElementsByClassName('totalPrice')
            selectedProduct.forEach((value, index) => {
                totalPrice[index].innerHTML = value.total + " tk"
            })
            updateForm()
        }



        function updateForm(){
            document.getElementById('form-kocukhet').innerHTML = ''
            selectedProduct.forEach(value => {
                document.getElementById('form-kocukhet').innerHTML += `
                            <input type="hidden"  value="${value.name}" name="p_name[]">
                            <input type="hidden" value="${value.id}" name="p_id[]">
                            <input type="hidden" value="${value.qty}" name="p_qty[]">
                            <input type="hidden" value="${value.unit_price}" name="p_u_price[]">
                            `
            })
        }
        updateClassSelection()


    </script>
@endsection