<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

class SimpleQRcodeController extends Controller
{
     // L'action "generate" de la route "simple-qrcode" (GET)
    public function generate () {

    	# 2. On génère un QR code de taille 200 x 200 px
    	$qrcode = QrCode::size(200)->generate(response()->json([
			"monnom"=>"mohamed",
			"mon prenom"=>"ndoye"
		]));

		# 3. On envoie le QR code généré à la vue "simple-qrcode"
		return response()->json(["welcome"=>$qrcode]);
    }
}