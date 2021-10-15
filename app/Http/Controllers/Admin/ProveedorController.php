<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Proveedor\BulkDestroyProveedor;
use App\Http\Requests\Admin\Proveedor\DestroyProveedor;
use App\Http\Requests\Admin\Proveedor\IndexProveedor;
use App\Http\Requests\Admin\Proveedor\StoreProveedor;
use App\Http\Requests\Admin\Proveedor\UpdateProveedor;
use App\Models\Proveedor;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProveedorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexProveedor $request
     * @return array|Factory|View
     */
    public function index(IndexProveedor $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Proveedor::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.proveedor.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.proveedor.create');

        return view('admin.proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProveedor $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreProveedor $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Proveedor
        $proveedor = Proveedor::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/proveedors'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/proveedors');
    }

    /**
     * Display the specified resource.
     *
     * @param Proveedor $proveedor
     * @throws AuthorizationException
     * @return void
     */
    public function show(Proveedor $proveedor)
    {
        $this->authorize('admin.proveedor.show', $proveedor);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Proveedor $proveedor
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Proveedor $proveedor)
    {
        $this->authorize('admin.proveedor.edit', $proveedor);


        return view('admin.proveedor.edit', [
            'proveedor' => $proveedor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProveedor $request
     * @param Proveedor $proveedor
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateProveedor $request, Proveedor $proveedor)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Proveedor
        $proveedor->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/proveedors'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/proveedors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyProveedor $request
     * @param Proveedor $proveedor
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyProveedor $request, Proveedor $proveedor)
    {
        $proveedor->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyProveedor $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyProveedor $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Proveedor::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
