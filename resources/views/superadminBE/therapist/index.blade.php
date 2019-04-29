@extends('superadminBE_layout.template')


@section('content')

  <div class="col-md-12">
                <!-- START PANEL -->
                <div class="panel panel-transparent">
                  <div class="panel-heading">
                    <div class="panel-title">All therapists (showing {{$therapists->count()}}  of {{$therapists->total()}})

                    	
                    </div>
                    <div class="tools">
                      <a class="collapse" href="javascript:;"></a>
                      <a class="config" data-toggle="modal" href="#grid-config"></a>
                      <a class="reload" href="javascript:;"></a>
                      <a class="remove" href="javascript:;"></a>
                    </div>
                  </div>
                  <div class="panel-body">
                    <div class="table-responsive">
                      <div id="condensedTable_wrapper" class="dataTables_wrapper form-inline no-footer"><table class="table table-hover table-condensed dataTable no-footer" id="condensedTable" role="grid">
                        <thead>
                          <tr role="row"><th style="width:30%" class="sorting_asc" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Title: activate to sort column descending">Name</th><th style="width: 118px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Key: activate to sort column ascending">Email</th>
                          	<th style="width: 118px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Key: activate to sort column ascending">Status</th>
                          	<th style="width: 158px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Condensed: activate to sort column ascending">Action</th></tr>
                        </thead>
                        <tbody>
                          
                          
                          
                          
                          @forelse($therapists as $therapist)
                        <tr role="row" class="odd">
                            <td class="v-align-middle semi-bold sorting_1">{{$therapist->user->first_name}}  {{$therapist->user->last_name}}</td>
                            <td class="v-align-middle">{{$therapist->user->email}}</td>
                            <td class="v-align-middle">
                            @if($therapist->verified == true)

                            <p style="color:green">Verified</p>

                            @else

                            <p style="color:brown">Unverified</p>
                            <p><span class="badge">view document</span></p>

                            @endif
                        </td>
                            <td class="v-align-middle semi-bold">
                            	<a class="btn btn-primary" href="{{route('therapist.show',['id'=>$therapist['id']])}}">view</a>

                            	@if($therapist['verified'] == false)
                            	<form method="post" action="{{route('therapist.verify',['id'=>$therapist['id']])}}">


                            	<button class="btn btn-success delete_buttons" >verify</button>

                            	{{method_field('PUT')}}
                            		{{csrf_field()}}
                            </form>

                            	{{--@else


                            	<form method="post" action="{{route('therapist.destroy',['id'=>$therapist['id']])}}">


                            	<button class="btn btn-info delete_buttons" >unverify</button>

                            	{{method_field('DELETE')}}
                            		{{csrf_field()}}
                            </form>
                            --}}


                            	@endif



                            	<form method="post" action="{{route('therapist.destroy',['id'=>$therapist['id']])}}">


                            	<button class="btn btn-danger delete_buttons" >delete</button>

                            	{{method_field('DELETE')}}
                            		{{csrf_field()}}
                            </form>
                            </td>
                          </tr>
                          @empty
                          No therapist currently registered!
                          @endforelse

                       
                        </tbody>
                      </table>
                      <div class="col-md-12">
                      	
                      	   {{$therapists->links()}}
                      </div>
                  </div>
                    </div>
                  </div>
                </div>
                <!-- END PANEL -->
              </div>



    <script src="{{asset('superadmin/assets/plugins/jquery/jquery-1.11.1.min.js')}}" type="text/javascript"></script>


    <script type="text/javascript">
    	$(document).ready(function(){
    		$('.delete_buttons').each(function(){
    			$(this).click(function(){
    				if(confirm('do you really want to delete this therapist?'))
    				{
    					return true;
    				}
    				else{
    					return false;
    				}
    			})
    		})
    	})
    </script>
           



@endsection