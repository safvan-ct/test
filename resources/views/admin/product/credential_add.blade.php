@foreach ($datas as $accounts)
    <div class="modal fade" id="credential{{ $accounts->id }}" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $accounts->name }} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <form action="{{ route('accounts_update', $accounts->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <div class="form-group row">

                            <div class="col-md-6 mb-3">
                                <label>Email</label>
                                <input type="text" class="form-control" name="Email[]" value="{{ $accounts->name }}">
                                @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>


                            <div class="col-md-6 mb-3">
                                <label>Email Password </label>
                                <input type="text" class="form-control" name="Epassword[]" value="{{ $accounts->name }}">
                                @error('email_password')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>


                            <div class="col-md-6 mb-3">
                                <label>Stream Username</label>
                                <input type="text" class="form-control" name="username[]" value="{{ $accounts->name }}">
                                @error('stream_username')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>


                            <div class="col-md-6 mb-3">
                                <label>Password</label>
                                <input type="text" class="form-control" name="password[]" value="{{ $accounts->name }}">
                                @error('stream_password')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <a href="javascript:void(0);" class="add_button" title="Add field"> <button id="btnAdd" type="button" class="btn btn-primary" data-toggle="tooltip"
                                data-original-title="Add more Members">
                                &nbsp; + &nbsp;
                            </button></a>

                        </div>
                    </div>

                    <script type="text/javascript">
                        $(document).ready(function(){
                            var maxField = 10; //Input fields increment limitation
                            var addButton = $('.add_button'); //Add button selector
                            var wrapper = $('.field_wrapper'); //Input field wrapper
                            var fieldHTML = '<div><div class="col-sm-12 col-md-10"> <h5 class="text-center">New Credential</h5>    </div><div class="form-group row mb-4"><div class="col-sm-12 col-md-5"><label class="col-form-label">Email</label><input type="email" class="form-control" name="Email[]" required> </div> <div class="col-sm-12 col-md-5"> <label class="col-form-label">Email Password</label><input type="password" class="form-control" name="Epassword[]" required> </div> </div><div class="form-group row mb-4"><div class="col-sm-12 col-md-5"><label class="col-form-label">Stream Username</label><input type="text" class="form-control" name="username[]" ></div> <div class="col-sm-12 col-md-5"> <label class="col-form-label">Password</label> <input type="password" class="form-control" name="password[]" ></div> <div class="col-sm-12 col-md-2"></br></br><a href="javascript:void(0);" class="remove_button"><button id="btnAdd" type="button" class="btn btn-primary" data-toggle="tooltip"data-original-title="Add more Members">&nbsp; - &nbsp; </button></a></div></div></div>'; //New input field html
                            var x = 1; //Initial field counter is 1

                            //Once add button is clicked
                            $(addButton).click(function(){
                                //Check maximum number of input fields
                                if(x < maxField){
                                    x++; //Increment field counter
                                    $(wrapper).append(fieldHTML); //Add field html
                                }
                            });

                            //Once remove button is clicked
                            $(wrapper).on('click', '.remove_button', function(e){
                                e.preventDefault();
                                $(this).parent('div').parent('div').parent('div').remove(); //Remove field html
                                x--; //Decrement field counter
                            });
                        });
                        </script>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="case" value="insert">Update</button>
                    </div>
                </form> --}}



              <form action="{{ route('credentials_store', $accounts->id) }}" method="post" enctype="multipart/form-data">
                   @csrf


			   <div class="modal-body">


			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
					 <div class="field_wrapper">

		 <div class="form-group row mb-4">
		<div class="col-sm-12 col-md-5">
                    <label class="col-form-label">Email</label>
                    <input type="email" class="form-control" name="Email[]" required>
                  </div>
		 <div class="col-sm-12 col-md-5">
                    <label class="col-form-label">Email Password</label>
                    <input type="password" class="form-control" name="Epassword[]" required>
                  </div>

		</div>

		 <div class="form-group row mb-4">
		<div class="col-sm-12 col-md-5">
                    <label class="col-form-label">Stream Username</label>
                    <input type="text" class="form-control" name="username[]" required>
                  </div>
		 <div class="col-sm-12 col-md-5">
                    <label class="col-form-label">Password</label>
                    <input type="password" class="form-control" name="password[]" required>
                  </div>


			    </br>

        {{-- <a href="javascript:void(0);" class="add_button" title="Add field"> <button id="btnAdd" type="button" class="btn btn-primary" data-toggle="tooltip"
                                        data-original-title="Add more Members">
                                        &nbsp; + &nbsp;
                                    </button></a> --}}

			</div>


</div>

<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><div class="col-sm-12 col-md-10"> <h5 class="text-center">New Credential</h5>    </div><div class="form-group row mb-4"><div class="col-sm-12 col-md-5"><label class="col-form-label">Email</label><input type="email" class="form-control" name="Email[]" required> </div> <div class="col-sm-12 col-md-5"> <label class="col-form-label">Email Password</label><input type="password" class="form-control" name="Epassword[]" required> </div> </div><div class="form-group row mb-4"><div class="col-sm-12 col-md-5"><label class="col-form-label">Stream Username</label><input type="text" class="form-control" name="username[]" ></div> <div class="col-sm-12 col-md-5"> <label class="col-form-label">Password</label> <input type="password" class="form-control" name="password[]" ></div> <div class="col-sm-12 col-md-2"></br></br><a href="javascript:void(0);" class="remove_button"><button id="btnAdd" type="button" class="btn btn-primary" data-toggle="tooltip"data-original-title="Add more Members">&nbsp; - &nbsp; </button></a></div></div></div>'; //New input field html
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>





                <div class="modal-footer bg-whitesmoke br">
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                     </div>

					  </div>


              </form>



            </div>
        </div>
    </div>

@endforeach
