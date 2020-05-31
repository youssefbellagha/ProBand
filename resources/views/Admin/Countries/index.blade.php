 @extends('layouts.app')
@section('plugins.Datatables', true)
@section('title', 'Countries Settings')
@section('content_header')
    <h1>Countries Settings</h1>
@stop
@section('content')
<div class="panel panel-default">

      

<div class="nav-tabs-custom">
            <ul class="nav nav-tabs ">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Countries</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Cities</a></li>
              
           
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                  <div class="content ">
                      <div class="row">
                          <form  action="{{ url('countries') }}" enctype="multipart/form-data" class="form-horizontal" method="POST">
  {{ csrf_field() }}

                         <div class="col-md-4 col-md-offset-4">
                 
                      <div class="col-md-9">
                         <select id="select_all_country" id="country"  name="country" class="form-control select2 ">
                             <option>Please choose Countries </option>
                      @foreach ($countries->pluck('name.common', 'flag.emoji') as $country => $code   )
                    <option value="{{ $code }}">{{ $country.$code  }}</option>
                    

                    @endforeach
                         </select>
                       
                    </div>
                <div class="col-md-3">
                <button type="submut" class="btn  btn-info fa fa-plus" onclick="" >Add</button>
                
            </div> 
            </div>
            </form>
            
            </div>
            <br><br>
            
               <table id="example2" class="table table-bordered table-striped">

<thead>
<tr>
                  <th>ID</th>
                  <th>Flag</th>
                  <th>Country name</th>
                 
                 
                   <th>Action</th>
</tr>
</thead>
<tbody>
  
     @foreach ($mycountries as $country)
     <tr>
     <td>{{ $country->code}} </td>
     <td>{{ $country->flag}}</td>
    <td>{{ $country->name}} </td>
    

    <td> <form action="{{ Route('countries.destroy',$country->id) }}" class=""  method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}   <button type="submit" class="btn  btn-danger fa fa-trash-o" ></form> 
         </td>
</tr>
@endforeach


</tbody>
</table>
 
            </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
               
                                 <div class="content ">
                      <div class="row">
                         <form  action="{{ url('citie') }}" enctype="multipart/form-data" class="form-horizontal" method="POST">
  {{ csrf_field() }}
                         <div class="col-md-3 ">
                 <select  id="countre"  name="countre" class="form-control select2 ">
                           <option>Please choose Countries </option>
                      @foreach ($mycountries as $countre)
                    <option value="{{ $countre->id }}">{{ $countre->name  }}</option>
                   

                    @endforeach
                         </select>
                      
                       
                    </div>
             <div class="col-md-3">
                <div class="form-group ">
                             <select  id="city"  name="city" class="form-control select2 ">
                             </select>
                </div>
                
            </div> 
            <div class="col-md-3">
             
                
            </div> 
                <div class="col-md-2">
                <button type="submit" class="btn btn-block btn-info" onclick="" ><i class="fa fa-fw fa-plus"></i></button>
                
            </div> 
</form>
            </div>
            <br><br>
    <table id="example2" class="table table-bordered table-striped">
      
                         <thead>
                        <tr>
                  <th>ID</th>
                  <th>Flag</th>
                  <th>Country name</th>
                  <th>City</th>
                
                   <th>Action </th>
                     </tr>
                    </thead>
                   <tbody>
                    @foreach ($mycitie as $city)
     <tr>
     <td>{{ $city->id}} </td>
     @foreach($city->Countrie()->get() as $contry)
     <td>{{ $contry->flag }}</td>
     <td>{{ $contry->name}}</td>
     @endforeach
    <td>{{ $city->name}} </td>
    
  <td> <form action="{{ url('destroycitie',$city->id) }}" class=""  method="POST">
                    {{ csrf_field() }}
                      <button type="submit" class="btn  btn-danger fa fa-trash-o" ></form> 
         </td>
  </tr>
  @endforeach

                  </tbody>
                  </table>
            
            
            </div>
            
            
            
            
            </div>
               
               
              </div>
              
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
           </div>


           @endsection

@section('js')
  <script>
      $(function () {

          $('#example2').DataTable({
              'paging'      : true,
              'lengthChange': false,
              'searching'   : true,
              'ordering'    : true,
              'info'        : true,
              'autoWidth'   : false
          })
      })
      $(document).ready(function() {

$('#countre').change(function(){
        $.get("{{ url('dropdown')}}", 
        { option: $(this).val() }, 
        function(data) {
            $('#city').empty(); 
            
            $.each(data, function(key, element) {
                $('#city').append("<option value='" + element + "'>" + element + "</option>");
            });
        });
    });


      });
  </script>

  @endsection
