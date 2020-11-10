@extends('layouts.header')

@section('content')
<link rel="stylesheet" href="{{ asset('css/tables.css') }}">

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        {{__('messages.fishes.table')}}

    </div>
    <div class="card-body">
        <div class="table-responsive steelBlueCols">
            <table class="table table-striped table-bordered comicGreen" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{__('messages.fishes.id')}}</th>
                        <th>{{__('messages.fishes.name')}}</th>
                        <th>{{__('messages.fishes.species')}}</th>
                        <th>{{__('messages.fishes.family')}}</th>
                        <th>{{__('messages.fishes.color')}}</th>
                        <th>{{__('messages.fishes.price')}}</th>
                        <th>{{__('messages.fishes.size')}}</th>
                        <th>{{__('messages.fishes.temperament')}}</th>
                        <th>{{__('messages.fishes.in_stock')}}</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>{{__('messages.fishes.id')}}</th>
                        <th>{{__('messages.fishes.name')}}</th>
                        <th>{{__('messages.fishes.species')}}</th>
                        <th>{{__('messages.fishes.family')}}</th>
                        <th>{{__('messages.fishes.color')}}</th>
                        <th>{{__('messages.fishes.price')}}</th>
                        <th>{{__('messages.fishes.size')}}</th>
                        <th>{{__('messages.fishes.temperament')}}</th>
                        <th>{{__('messages.fishes.in_stock')}}</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($data as $data)
                    <tr>
                        <td> {{$data['id']}}</td>
                        <td> {{$data['name']}}</td>
                        <td> {{$data['species']}}</td>
                        <td> {{$data['family']}}</td>
                        <td> {{$data['color']}}</td>
                        <td> {{$data['price']}}</td>
                        <td> {{$data['size']}}</td>
                        <td> {{$data['temperament']}}</td>
                        <td> {{$data['in_stock']}}</td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@section('js_user_page')

<script src="/vendor/chart.js/Chart.min.js"></script>
<script src="/js/admin/demo/chart-area-demo.js"></script>

<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var user_id = button.data('userid')

            var modal = $(this)
            // modal.find('.modal-footer #user_id').val(user_id)
            modal.find('form').attr('action','/users/' + user_id);
        })
</script>

@endsection
@endsection
@section('scripts')
<script>
    $(document).ready( function () {
    $('#dataTable').DataTable();
} );
</script>
@endsection
