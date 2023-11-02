@extends('themes.advanced.admin', ['nav_active' => 2,
    'title' =>  'Administración '
])

@section('content')
    
    <livewire:admin.categories.index></livewire:admin.categories.index>
    
@endsection
@push('scripts')
<script>
    window.addEventListener('show-edit-category-modal', event =>{
        $('#editCategory').modal('show');
    });
</script>
@endpush