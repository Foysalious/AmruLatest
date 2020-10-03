<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Invoice No</th>
            <th>Product Name</th>
            <th>Size</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total Price</th>

        </tr>
    </thead>
    @php
        $totalQuantity = 0;
        $totalSale = 0;
    @endphp
    <tbody>
        @foreach ($datas as $data)  
            <tr>
                <td>{{$data->updated_at->toDayDateTimeString()}}</td>
                <td>#{{$data->invoice_id}}</td>
                <td>{{$data->product_name}}</td>
                <td>{{$data->size}}</td>
                <td>{{$data->qty}}</td>
                <td>{{$data->unit_price}} tk</td>
                <td>{{$data->total}} tk</td>
                
            </tr>
            @php
                $totalQuantity += $data->qty;
                $totalSale += $data->total;
            @endphp
        @endforeach
    </tbody>
</table>

<table>
    <thead>
        <tr>
            <th>Total Quantity</th>
            <th>Total Sale</th>

        </tr>
    </thead>
    <tbody>       
        <tr>
            <td>{{$totalQuantity}}</td>
            <td>{{$totalSale}} tk</td>
            
        </tr>    
    </tbody>
</table>