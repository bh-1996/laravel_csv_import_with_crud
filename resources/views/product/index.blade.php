@extends('layouts.main')
@section('content')
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6"><h2>Product <b>List</b></h2></div>
                    <div class="col-sm-6">
                        <div class="btn-group" data-toggle="buttons">
                     <?php if($products->count()>0){?>
               <a class="btn btn-warning" download="sample_architect.csv" href="{{URL::to('/')}}/product/export_product" >
                 <b>
                    <i class="fa fa-download" aria-hidden="true"></i>
                    Download CSV</b>
               </a>
           <?php } ?>
               &nbsp;&nbsp;
               <a class="btn btn-info" class="" href="{{URL::to('/')}}/product/import_product">
                  <b><i class="fa fa-upload"></i>
                  Import Products</b>
               </a>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Product ID</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Created&nbsp;On</th>
                        <th>Description</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($products as $s_no => $row )
                    <tr>
                        <td>{{ $s_no+1  ?? '' }}</td>
                        <td>{{ '#'.$row->id ?? '' }}</td>
                        <td>{{ $row->title ?? '' }}</td>
                        <td>{{ $row->price ?? '' }}</td>
                        <td>{{ $row->created_at ?? '' }}</td>
                        <td>{{ $row->description ?? '' }}</td>
                        <td> <div><a href="{{route('product.edit',$row->id)}}" class="btn btn-dark">Edit</a></div></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="paginator">
                            {!! $products->links() !!}
                        </div>
        </div> 
       
    </div>   
</div> 
@endsection
  