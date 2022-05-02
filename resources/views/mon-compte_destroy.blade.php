<tbody>
    
    @foreach($utilisateurs as $utilisateur => $value) 
        
    {{ Form::open(array('url' => 'mon-compte/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this user', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
    @endforeach

</tbody>