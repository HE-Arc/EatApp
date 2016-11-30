@extends('layouts.children.titleToContent')

@section('childContent')

    <div class="row">
        <div class="panel-group full-width" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="button-justify">
                            <span class="glyphicon glyphicon-folder-close"></span>
                            Content</a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <td class="ingredient-description">
                                    <span class="glyphicon glyphicon-pencil text-primary"></span>POULET
                                </td>
                                <td class="ingredient-quantity">
                                    <input type="number" min="0" max="100" />
                                </td>
                                <td class="ingredient-unit">
                                    unité
                                </td>
                                <td class="ingredient-delete">
                                    <span class="glyphicon glyphicon-trash text-danger"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="glyphicon glyphicon-flash text-success"></span>SANDWICH
                                </td>
                                <td class="ingredient-quantity">
                                    <input type="number" min="0" max="100" />
                                </td>
                                <td class="ingredient-unit">
                                    unité
                                </td>
                                <td class="ingredient-delete">
                                    <span class="glyphicon glyphicon-trash text-danger"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="glyphicon glyphicon-file text-info"></span>CORNICHON
                                </td>
                                <td class="ingredient-quantity">
                                    <input type="number" min="0" max="100" />
                                </td>
                                <td class="ingredient-unit">
                                    unité
                                </td>
                                <td class="ingredient-delete">
                                    <span class="glyphicon glyphicon-trash text-danger"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="glyphicon glyphicon-comment text-success"></span>PQ ET VITE SVP
                                    <span class="badge">42</span>
                                </td>
                                <td class="ingredient-quantity">
                                    <input type="number" min="0" max="100" />
                                </td>
                                <td class="ingredient-unit">
                                    unité
                                </td>
                                <td class="ingredient-delete">
                                    <span class="glyphicon glyphicon-trash text-danger"></span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="button-justify"><span
                                    class="glyphicon glyphicon-th">
                            </span>Modules</a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <td>
                                    <a href="http://www.jquery2dotnet.com">Orders</a> <span class="label label-success">$ 320</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="http://www.jquery2dotnet.com">Invoices</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="http://www.jquery2dotnet.com">Shipments</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="http://www.jquery2dotnet.com">Tex</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="button-justify"><span
                                    class="glyphicon glyphicon-user">
                            </span>Account</a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <td>
                                    <a href="http://www.jquery2dotnet.com">Change Password</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="http://www.jquery2dotnet.com">Notifications</a> <span
                                            class="label label-info">5</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="http://www.jquery2dotnet.com">Import/Export</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="glyphicon glyphicon-trash text-danger"></span><a
                                            href="http://www.jquery2dotnet.com" class="text-danger">
                                        Delete Account</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" class="button-justify"><span
                                    class="glyphicon glyphicon-file">
                            </span>Reports</a>
                    </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse">
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <td>
                                    <span class="glyphicon glyphicon-usd"></span><a href="http://www.jquery2dotnet.com">Sales</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="glyphicon glyphicon-user"></span><a
                                            href="http://www.jquery2dotnet.com">Customers</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="glyphicon glyphicon-tasks"></span><a
                                            href="http://www.jquery2dotnet.com">Products</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="glyphicon glyphicon-shopping-cart"></span><a
                                            href="http://www.jquery2dotnet.com">Shopping Cart</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection