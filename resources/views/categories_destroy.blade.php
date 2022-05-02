<tbody>
    
    @foreach($categories as $categories => $value) 
        
    {{ Form::open(array('url' => 'admin_categories/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this user', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
    @endforeach

</tbody>