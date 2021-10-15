@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.tienda.actions.edit', ['name' => $tienda->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <tienda-form
                :action="'{{ $tienda->resource_url }}'"
                :data="{{ $tienda->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.tienda.actions.edit', ['name' => $tienda->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.tienda.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </tienda-form>

        </div>
    
</div>

@endsection