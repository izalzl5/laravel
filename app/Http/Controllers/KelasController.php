<?php

namespace App\Http\Controllers;
use App\Models\Kelas;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    public function index(Request $request) {
        $query = $request->input('query');
    
        if ($query) {
            $kelass = Kelas::where('kelas_siswa', 'like', '%' . $query . '%')
                                ->paginate(4); 
        } else {
            $kelass = Kelas::paginate(4); 
        }
        
        return view('dashboard.kelas.all', [
            "title" => "Kelas",
            "kelass" => $kelass,
            "isAuthenticated" => Auth::check(),
        ]);
    }
    public function indexhome( ) {
      
         return view('kelas.all', [
             "title" => "Kelas",
             "kelass" => Kelas::all(),
             
         ]);
     }
    
    public function show($kelasId){
        
        $kelas = Kelas::find($kelasId);
        $title = "Details " . $kelas->nama_siswa;
    
        return view("dashboard.kelas.detail", [
            "title" => $title,
            "kelas" => $kelas,
            "isAuthenticated" => Auth::check(),
        ]);
    }
  
    public function destroy(Kelas $kelas){
        $result = $kelas->delete();
        if($result){
        return redirect('/dashboard/kelas/all')->with('success','Data Siswa berhasil dihapus');
        }
    }
    public function create(){
        
        $title = "Add Data";
        return view("dashboard.kelas.create", [
            "title" => $title,
            
        ]);
        
    }
    public function edit(Kelas $kelas){
        
        $title = "Edit " . $kelas->kelas_siswa;
    return view('dashboard.kelas.edit',[
    "title"=>"$title",
    "kelas"=> $kelas,
    
        ]);
    }
    public function update(Request $request, $kelasId){
        $kelas = Kelas::find($kelasId);
        $result = $kelas->update($request->all());
        if ($result) {
            return redirect('/dashboard/kelas/all')->with('success','Data Siswa berhasil dirubah');
        }
    }

    public function add(Request $request){
        $validateData = $request->validate([
            "kelas_siswa" => "required"
        ]);
        $result = Kelas::create($validateData);
        if ($result) {
            return redirect('/dashboard/kelas/all')->with('success','Data Siswa berhasil ditambah');
        }
        
        }


}