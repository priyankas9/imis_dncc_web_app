<!-- Last Modified Date: 18-04-2024
Developed By: Innovative Solution Pvt. Ltd. (ISPL)   -->
<div class="card-body">
    <div class="form-group row required">
        {!! Form::label('name','Help Desk Name',['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Help Desk Name']) !!}
        </div>
    </div>
    
    <div class="form-group row required">
        {!! Form::label('description',null,['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::textarea('description',null,['class' => 'form-control', 'placeholder' => 'Description']) !!}
        </div>
    </div>
    <div class="form-group row required">
        {!! Form::label('contact_number','Contact Number',['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('contact_number',null,['class' => 'form-control', 'placeholder' => 'Contact Number', 'oninput' => "validateOwnerContactInput(this)"]) !!}
        </div>
    </div>
    <div class="form-group row required">
        {!! Form::label('email','Email Address',['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('email',null,['class' => 'form-control', 'placeholder' => 'Email Address']) !!}
        </div>
    </div>
    @if(Auth::user()->service_provider_id)
        <div class="form-group row required" id="service_provider">
        {!! Form::label('service_provider_id','Service Provider',['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::label(null,$serviceProviders[Auth::user()->service_provider_id],['class' => 'form-control']) !!}
            {!! Form::text('service_provider_id', Auth::user()->service_provider_id, ['hidden' => 'true']) !!}
        </div>
    </div>

    {{-- @else
    <div class="form-group row" id="service_provider">
        {!! Form::label('service_provider_id','Service Provider',['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::select('service_provider_id', $serviceProviders, null, ['class' => 'form-control', 'placeholder' => 'Service Provider']) !!}
        </div>
    </div> --}}
    @endif
    @if(!$helpDesk)
	<div class="form-group row">
		{!! Form::label('create_user','Create User?',['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-3">
				<input type="checkbox" 
       name="create_user" 
       id="create_user" 
       class="create_user" 
       value="on" 
       {{ old('create_user') ? 'checked' : '' }}>
		</div>
	</div>
    <div id="user-password">
    <div class="form-group row ">
    {!! Form::label('password', 'Password', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-3">
        <!-- Password Input -->
        <input type="password" 
               class="form-control" 
               name="password" 
               id="password" 
               placeholder="Password">

        <!-- Error/Requirement Message Container -->
        <div id="password-error" class="mt-1" style="display: none; color: red;">
            <ul style="margin-bottom: 0; padding-left: 1rem;">
                <li id="char-count">The Password must be at least 8 characters.</li>
                <li id="uppercase-lowercase">The Password must contain at least one uppercase and one lowercase letter.</li>
                <li id="symbol">The Password must contain at least one symbol.</li>
                <li id="number">The Password must contain at least one number.</li>
            </ul>
        </div>
    </div>
</div>
<div class="form-group row">
    {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-3">
        <input type="password" 
               class="form-control" 
               name="password_confirmation" 
               id="password_confirmation" 
               placeholder="Confirm Password">

        <!-- Confirm Password Requirements -->
        <div id="confirm-password-error" class="mt-1" style="display: none; color: red;">
            <ul style="margin-bottom: 0; padding-left: 1rem;">
                <li id="confirm-char-count">The Password must be at least 8 characters.</li>
                <li id="confirm-uppercase-lowercase">The Password must contain at least one uppercase and one lowercase letter.</li>
                <li id="confirm-symbol">The Password must contain at least one symbol.</li>
                <li id="confirm-number">The Password must contain at least one number.</li>
                <li id="confirm-match">Confirm password must match the password.</li>
            </ul>
        </div>
    </div>
</div>
</div>
	@endif
</div><!-- /.box-body -->
<div class="card-footer">
    <a href="{{ action('Fsm\HelpDeskController@index') }}" class="btn btn-info">Back to List</a>
    {!! Form::submit('Save', ['class' => 'btn btn-info']) !!}
</div><!-- /.box-footer -->