@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Filters -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#filter"><i class="fas fa-filter"></i> Filter</a>
        </li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade show active" id="filter">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>Country</th>
                        <th>Description</th>
                        <th>Domains</th>
                        <th>Seller</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select class="form-control input-sm" id="filter-country">
                                <option value="">ALL</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->country }}">{{ $country->country }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input class="form-control input-sm" id="filter-description"></td>
                        <td><input class="form-control input-sm" id="filter-domains"></td>
                        <td>
                            <select class="form-control input-sm" id="filter-seller">
                                <option value="">ALL</option>
                                @foreach($sellers as $seller)
                                    <option value="{{ $seller->seller }}">{{ $seller->seller }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <button id="filter-button" class="btn btn-primary">Filter</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Table -->
    <table class="table table-striped table-bordered" id="leads-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Country</th>
                <th>Source</th>
                <th>Emails Domains</th>
                <th>Email N</th>
                <th>Sample</th>
                <th>Seller</th>
                <th>Price</th>
                <th>Added On</th>
                <th>Buy</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leads as $lead)
            <tr>
                <td>{{ $lead->id }}</td>
                <td>{{ $lead->country }}</td>
                <td>{{ $lead->source }}</td>
                <td>{{ $lead->domains }}</td>
                <td>{{ $lead->email_n }}</td>
                <td><button class="btn btn-info btn-sm" onclick="viewLead({{ $lead->id }})">View</button></td>
                <td>{{ $lead->seller }}</td>
                <td>{{ $lead->price }}</td>
                <td>{{ $lead->created_at->format('Y-m-d') }}</td>
                <td><button class="btn btn-success btn-sm" onclick="buyLead({{ $lead->id }})">Buy</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    // Filter function
    $('#filter-button').click(function () {
        const filters = {
            country: $('#filter-country').val(),
            description: $('#filter-description').val(),
            domains: $('#filter-domains').val(),
            seller: $('#filter-seller').val(),
        };

        $.post('{{ route('leads.filter') }}', filters, function (data) {
            let rows = '';
            data.forEach(lead => {
                rows += `<tr>
                    <td>${lead.id}</td>
                    <td>${lead.country}</td>
                    <td>${lead.source}</td>
                    <td>${lead.domains}</td>
                    <td>${lead.email_n}</td>
                    <td><button class="btn btn-info btn-sm" onclick="viewLead(${lead.id})">View</button></td>
                    <td>${lead.seller}</td>
                    <td>${lead.price}</td>
                    <td>${new Date(lead.created_at).toLocaleDateString()}</td>
                    <td><button class="btn btn-success btn-sm" onclick="buyLead(${lead.id})">Buy</button></td>
                </tr>`;
            });
            $('#leads-table tbody').html(rows);
        });
    });

    function buyLead(id) {
        $.get(`{{ url('/leads/buy') }}/${id}`, function (response) {
            alert(response.message);
        });
    }

    function viewLead(id) {
        window.location.href = `{{ url('/leads/show') }}/${id}`;
    }
</script>
@endsection