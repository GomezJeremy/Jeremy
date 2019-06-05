<?php
namespace App\Http\Controllers\Admin;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;  //MUYR IMPORTANTE , SIN ESTO NO GUARDA.
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePermissionsRequest;
use App\Http\Requests\Admin\UpdatePermissionsRequest;
class PermissionsController extends Controller
{
    /**
     * Display a listing of Permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // if (! Gate::allows('users_manage')) {
          //  return abort(401);
       // }
        $permissions = Permission::all();
        return view('permissions.index', compact('permissions'));
    }
    /**
     * Show the form for creating new Permission.
     *
     * @return \Illuminate\Http\Response
     */

     
     
public function addPermissions(Request $request){
    $rules = array(
      'name' => 'required'
    );
  $validator = Validator::make ( Input::all(), $rules);
  if ($validator->fails())
  
  return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

  else {
  
    $permissions = Permission::create($request->all());  
    $permissions->save();
    return response()->json($permissions);
 
  }
}

    
public function editPermissions(request $request){
  $rules = array(
    'name' => 'required'
  );
$validator = Validator::make ( Input::all(), $rules);
if ($validator->fails())
return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

else {

  $permission = Permission::findOrFail($id);
  $permission->update($request->all());
   $permission->save();
return response()->json($permission);
}
}

  /**
   * Store a newly created Role in storage.
   *
   * @param  \App\Http\Requests\StoreRolesRequest  $request
   * @return \Illuminate\Http\Response
   */
  
  /**
   * Delete all selected Role at once.
   *
   * @param Request $request
   */
  
    public function massDestroy(Request $request)
    {
       // if (! Gate::allows('users_manage')) {
         //   return abort(401);
        //}
        if ($request->input('ids')) {
            $entries = Permission::whereIn('id', $request->input('ids'))->get();
            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}