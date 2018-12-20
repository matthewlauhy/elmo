@extends('layout.base')

@section('content')
    <h1>Home</h1>
    <table class="table" id="tblCustomer">
        <thead>
        <tr><th scope="col">First Name</th><th scope="col">Last Name</th><th>Action</th></tr>
        </thead>
    </table>
    <input id="addCustomer" type="button" class="btn btn-primary" value="Add Customer"/>
    <div id="divCustomer" class="collapse mt-3">
        <form id="frmCustomer">
            <div class="row"><div class="col-md-6"><label>First Name: </label><input class="form-control" name="first_name" type="text" /></div>
            <div class="col-md-6"><label>Last Name: </label><input class="form-control" name="last_name" type="text" /></div></div>
            <input id="saveCustomer" type="button" class="btn btn-primary" value="Save"/>
            <input id="cancelSave" type="button" class="btn btn-secondary" value="Cancel"/>

        </form>
    </div>
    <div id="divUpdateCustomer" class="collapse mt-3">
        <form id="frmUpdateCustomer">
            <div class="row">
                <div class="col-md-6"><label>First Name: </label><input class="form-control" id="editFirstName" name="first_name" type="text" /></div>
                <div class="col-md-6"><label>Last Name: </label><input class="form-control" id="editLastName" name="last_name" type="text" /></div>
                <input id="hdnCustomerId" type="hidden" name="customer_id" value=""/>
            </div>
            <input id="updateCustomer" type="button" class="btn btn-primary" value="Save"/>
            <input id="cancelUpdate" type="button" class="btn btn-secondary" value="Cancel"/>

        </form>
    </div>


@endsection

@section('sidebar')
    @parent
    <p>This is appended content</p>
@endsection

@section('script')
    <script src="/js/home.js" ></script>
@endsection