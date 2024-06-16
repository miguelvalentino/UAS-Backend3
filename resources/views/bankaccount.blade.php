<h1>{{$heading}}</h1>

@unless(count($users)==0)

@foreach($users as $user)
<h2>
    userid:{{$user['id']}}
</h2>
<p>
    name:{{$user['name']}}
</p>
<p>
    email:{{$user['email']}}
</p>
<p>
    password:{{$user['password']}}
</p>
<h4>bank account details</h4>
@foreach($bankAccounts as $bankAccount)
@if($bankAccount['user_id']==$user['id'])
<p>bank account id:{{$bankAccount['id']}}</p>
<p>balance:{{$bankAccount['balance']}}</p>
@endif
@endforeach
@endforeach
@else
<p> nothing found</p>
@endunless