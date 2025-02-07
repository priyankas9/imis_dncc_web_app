<!-- Last Modified Date: 18-04-2024
Developed By: Innovative Solution Pvt. Ltd. (ISPL)   -->
<div class="card-body">
	<div class="form-group row required">
		{!! Form::label('company_name','Company Name',['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-3">
			{!! Form::text('company_name',null,['class' => 'form-control', 'placeholder' => 'Company Name']) !!}
		</div>
	</div>
	<div class="form-group row required">
		{!! Form::label('email','Email',['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-3">
			{!! Form::text('email',null,['class' => 'form-control', 'placeholder' => 'Email']) !!}
		</div>
	</div>
	<div class="form-group row required">
		{!! Form::label('ward','Ward Number',['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-3">
			{!! Form::select('ward', $wards, null, ['class' => 'form-control', 'placeholder' => 'Ward Number']) !!}
		</div>
	</div>
	<div class="form-group row required">
		{!! Form::label('company_location','Address',['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-3">
			{!! Form::text('company_location',null,['class' => 'form-control', 'placeholder' => 'Address']) !!}
		</div>
	</div>

	<div class="form-group row required">
		{!! Form::label('contact_person','Contact Person Name',['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-3">
			{!! Form::text('contact_person',null,['class' => 'form-control', 'placeholder' => 'Contact Person Name']) !!}
		</div>
	</div>
	<div class="form-group row required">
        {!! Form::label('contact_gender','Contact Person Gender',array('class'=>'col-sm-3 control-label')) !!}
        <div class="col-sm-3">
        {!! Form::select('contact_gender',array("Male"=>"Male","Female"=>"Female","Others"=>"Others"), null,['class' => 'form-control', 'placeholder' => 'Contact Person Gender']) !!}
        </div>
    </div>
	<div class="form-group row required">
		{!! Form::label('contact_number','Contact Person Number',['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-3">
			{!! Form::text('contact_number',null,['class' => 'form-control', 'placeholder' => 'Contact Person Number','oninput' => "validateOwnerContactInput(this)",]) !!}
		</div>
	</div>
	<div class="form-group row required">
        {!! Form::label('status','Status',['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::select('status', $serviceProviderStatus, null, ['class' => 'form-control chosen-select', 'placeholder' => 'Status']) !!}
        </div>
    </div>

	@if(!$serviceProvider)
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
                <li id="confirm-match">Passwords must match.</li>
            </ul>
        </div>
    </div>
</div>
</div>
	@endif
</div><!-- /.box-body -->
<div class="card-footer">
	<a href="{{ action('Fsm\ServiceProviderController@index') }}" class="btn btn-info">Back to List</a>
	{!! Form::submit('Save', ['class' => 'btn btn-info']) !!}
</div><!-- /.box-footer -->

