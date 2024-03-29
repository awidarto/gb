@layout('master')


@section('content')
<div class="tableHeader">
<h3>{{$title}}</h3>
</div>

{{$form->open_for_files('document/add','POST',array('class'=>'custom','id'=>'newdoc'))}}
<div class="row">
  <div class="six columns left">
    <h4>Document Info</h4>
    {{ $form->text('title','Title.req','',array('class'=>'text')) }}
    {{ $form->textarea('description','Description.req','',array('class'=>'text')) }}
    {{ $form->textarea('body','Body','',array('class'=>'text')) }}

    {{$form->select('docFormat','Original Document Format',Config::get('parama.doc_format'),array('class'=>'four'))}}

    {{ $form->file('docupload','Document File')}}
    <div id="upload-indicator" style="display:none" >Uploading file, please wait.</div>

    {{ $form->text('docRevisionOf','Revision of','',array('class'=>'tag_revision four','rows'=>'1', 'style'=>'width:100%')) }}

  </div>
  <div class="five columns right">
    <h4>Metadata</h4>

    {{$form->select('docDepartment','Department of Origin',Config::get('parama.department'),array('class'=>'four'))}}

    {{ $form->select('docCategory','Category',Config::get('parama.doc_type'),array('class'=>'four'))}}

    {{ $form->text('docProject','Related Project','',array('class'=>'tag_project four','rows'=>'1', 'style'=>'width:100%')) }}
    {{ $form->text('docTender','Related Tender','',array('class'=>'tag_tender four','rows'=>'1', 'style'=>'width:100%')) }}
    {{ $form->text('docLead','Related Opportunity','',array('class'=>'tag_opportunity four','rows'=>'1', 'style'=>'width:100%')) }}

    {{ $form->text('docTag','Tag','',array('class'=>'tag_keyword four','rows'=>'1', 'style'=>'width:100%')) }}

    {{ $form->text('docShare','Shared to','',array('class'=>'tag_email four','style'=>'width:100%')) }}

    {{ $form->text('docApproval','Approved by','',array('class'=>'tag_email four', 'style'=>'width:100%')) }}

    {{ $form->text('effectiveDate','Effective Date','',array('class'=>'five date')) }}
    {{ $form->text('expiryDate','Expiry Date','',array('class'=>'five date')) }}

  </div>
</div>

<div class="row right">
{{ Form::submit('Save',array('class'=>'button'))}}&nbsp;&nbsp;
{{ Form::reset('Reset',array('class'=>'button'))}}
</div>
{{$form->close()}}

<script type="text/javascript">
  $('select').select2();

  $('#field_role').change(function(){
      //alert($('#field_role').val());
      // load default permission here
  });

  $('#newdoc').submit(function() {
    $('#upload-indicator').toggle();
    $('#newdoc').submit();
  });

</script>

@endsection