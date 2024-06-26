<h1>{{$heading}}</h1>

@unless(count($table)==0)

@if($isPaginating)
@if($hasNext)
<h4>has next page:true<h4>
@else
<h4>has next page:false<h4>
@endif

@if(!$hasPrev)
<h4>has previous page:true<h4>
@else
<h4>has previous page:false<h4>
@endif

<h4>current page:{{$currPage;}}</h4>
<h4>number of pages:{{$table->lastPage();}}</h4>
@endif


@foreach($table as $acc)
<h2>
    userid:{{$acc['user_id']}}
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


<p>
    admin:@if($acc['admin']){{'true'}}@else{{'false'}}@endif
</p>
<h3>bank account details</h3>
<p>bank account id:{{$acc['bank_account_id']}}</p>
<p>balance:{{$acc['balance']}}</p>
<p>deposito balance:{{$acc['deposito_balance']}}</p>
<p>credit card number:{{$acc['credit']}}</p>
<p>credit card blocked:@if($acc['blocked']){{'true'}}@else{{'false'}}@endif</p>
@endforeach
@else
<p> nothing found</p>
@endunless