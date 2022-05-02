@foreach($products as $product => $value)
  <div class="column is-full">
<!-- title, category, description, picture(s), price, location -->

  <tr>
     <td>
        {{ Form::open(array('url' => 'ads/' . $value->id, 'class' => 'pull-right')) }}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Delete this ads', array('class' => 'btn btn-warning')) }}
        {{ Form::close() }}
      </td>
  </tr>
  @endforeach