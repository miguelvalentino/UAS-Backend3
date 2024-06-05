<h1>{{$heading}}</h1>

@unless(count($bankAccounts)==0)

@foreach($bankAccounts as $bankAccount)
@if($targetId==$bankAccount['id'])
<h2>
    id:{{$bankAccount['id']}}
</h2>
<p>
    name:{{$bankAccount['name']}}
</p>
<p>
    email:{{$bankAccount['email']}}
</p>
<p>
    telno:{{$bankAccount['telNo']}}
</p>
<p>
    balance:{{$bankAccount['balance']}}
</p>
<p>
    password:{{$bankAccount['password']}}
</p>
@endif
@endforeach
@else
<p> nothing found</p>
@endunless