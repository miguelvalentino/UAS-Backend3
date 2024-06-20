<h1>{{$heading}}</h1>

@unless(count($table)==0)

@foreach($table as $acc)
<h2>
    userid:{{$acc['id']}}
</h2>
<p>
    name:{{$acc['name']}}
</p>
<p>
    email:{{$acc['email']}}
</p>
<p>
    password:{{$acc['password']}}
</p>
<h4>bank account details</h4>
<p>bank account id:{{$acc['bank_account_id']}}</p>
<p>balance:{{$acc['balance']}}</p>
@endforeach
@else
<p> nothing found</p>
@endunless