@extends('admin.layouts.master')

@section('content')

  <div class="row">
                            <div class="col s12">
                                <div class="card">
                                    <div class="card-content">
                                        <a class="waves-effect waves-light btn mb-1 mr-1" href="{{route('admin.category.create')}}">
                                                                <i class="material-icons left">add</i>Add</a>
                                        <div class="row">
                                            <div class="col s12">
                                                <table id="page-length-option" class="display">
                                                    <thead>
                                                        <tr>
                                                            <th>Category</th>
                                                            <th>Slug</th>
                                                            <th>Childrens</th>
                                                            <th>Created At</th>
                                                            <th>Action</th>
                                                          
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                              
                                                    @if($categories->count() > 0)
                                                    @foreach($categories as $category)
                                                        <tr>
                                                            <td>{{$category->category}}</td>
                                                            <td>{{$category->slug}}</td>
                                                            <td> @if($category->children()->count() > 0)
                                            @foreach($category->children as $children)
                                                     {{$children->category}},
                                              @endforeach
                                           @else
                                         <strong>{{"Parent Category"}}</strong>
                                                @endif</td>
                                                            <td>Carbon::createFromFormat({{$category->created_at}})</td>
                                                            <td>
                                                            <a type="button" id="dltCategory" data-id="{{$category->id}}" class="btn-floating mb-1 waves-effect waves-light red ">
                                                            <i class="material-icons">delete</i>
                                                        </a>  <a class="btn-floating mb-1 waves-effect waves-light green " href="{{route('admin.category.edit',$category->id)}}" id="editCategory">
                                                            <i class="material-icons">edit</i>
                                                        </a>
                                                        </td>
                                                          
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                      
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Position</th>
                                                            <th>Office</th>
                                                            <th>Age</th>
                                                            <th>Start date</th>
                                                            <th>Salary</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


@endsection
@section('scripts')
<script type="text/javascript">
      $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
})
$(document).ready(function(){
   $("#dltCategory").on('click',function(e){
      e.preventDefault();
      var id = $(this).data("id");
    
      $.ajax({
        type: 'Delete',
        url: "category/"+id,
        data: {
          "id": id,
               
        },

        dataType: 'json',
        success:function(data){
           if($.isEmptyObject(data.error)){
                       swal({
                           title: 'Record Deleted',
                          icon: 'success'
                        })
                    }else{
                      swal({
                         title: data.error,
                          icon: 'error'
                        })
                       
                    }
                    
        }
      });

    });
   function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
});
</script>
@endsection