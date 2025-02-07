@extends('layouts.dashboard')
@push('style')
<style type="text/css">
.dataTables_filter {
    display: none;
}
</style>
@endpush
@section('title', $page_title)
@section('content')
@include('layouts.components.error-list')
@include('layouts.components.success-alert')
@include('layouts.components.error-alert')
<div class="card">
    <div class="card-body">
    {!! Form::model(['method' => 'PATCH', 'action' => ['Fsm\TreatmentplantPerformanceTestController@update'], 'class' => 'form-horizontal' , 'id' => 'editForm']) !!}
    <div class="form-group row">
    <div class="col-sm-3" style="color:grey">
        <small><i class="fa-regular fa-clock"></i> Last Updated: {{ $updated}}</small>
    </div>
</div>
    <div class="form-group row ">
        {!! Form::label('tss_standard','TSS Standard (mg/l)',['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-3">
        {!! Form::text('tss_standard', isset($data) ? $data->tss_standard : 0, [
    'class' => 'form-control',
    'placeholder' => 'TSS Standard',
    'oninput' => "this.value = this.value.replace(/[^0-9.]/g, '').replace(/^(\d*\.?)|\./g, '$1')", // Allow only numbers and one decimal point
]) !!}
        </div>
    </div>

    <div class="form-group row ">
        {!! Form::label('ecoli_standard','ECOLI Standard (CFU/100 mL)',['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-3">
        {!! Form::text('ecoli_standard', isset($data) ? $data->ecoli_standard : 0, [
    'class' => 'form-control',
    'placeholder' => 'ECOLI Standard',

]) !!}

       </div>
    </div>
    <div class="form-group row ">
        {!! Form::label('ph_min','pH Minimum',['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('ph_min',isset($data) ? $data->ph_min : 0,['class' => 'form-control', 'placeholder' => 'pH Minimum', 'oninput' => "this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\\..*?)\\..*/g, '$1')",]) !!}
        </div>
    </div>
    <div class="form-group row ">
        {!! Form::label('ph_max','pH Maximum',['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('ph_max', isset($data) ? $data->ph_max : 0,['class' => 'form-control', 'placeholder' => 'pH Maximum', 'oninput' => "this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\\..*?)\\..*/g, '$1')",]) !!}
        </div>
    </div>
    <div class="form-group row ">
        {!! Form::label('bod_standard','BOD Standard (mg/l)',['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('bod_standard',isset($data) ? $data->bod_standard : 0,['class' => 'form-control', 'placeholder' => 'BOD Standard', 'oninput' => "this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\\..*?)\\..*/g, '$1')",]) !!}
        </div>
    </div>

</div><!-- /.box-body -->
@can('Edit Treatment Plant Efficiency Standard')
<div class="card-footer">
        <span id="editButton" class="btn btn-info">Edit</span>
        <button type="submit" id="saveButton" class="btn btn-info" style="display: none;">Save</button>
    </div><!-- /.box-footer -->
  </div>
  {!! Form::close() !!}
</div>
@endcan

</div><!-- /.box -->
@stop
@push('scripts')
<script>
$(document).ready(function () {
    function toggleReadOnly(readonly) {
        $('input').prop('readonly', readonly);
    }

    toggleReadOnly(true);

    $('#editButton').click(function () {
        $('input').removeAttr('readonly');
        $('#editButton').hide();
        $('#saveButton').show();

        // Hide the "Last Updated" information
        $('.form-group .col-sm-3 small').hide();
    });

    var hasErrors = $('.alert-danger').length > 0;

    if (hasErrors) {
        $('input').removeAttr('readonly');
        $('#editButton').hide();
        $('#saveButton').show();
    } else {
        $('#saveButton').hide();
        $('#editButton').show();
    }
});


</script>

@endpush
