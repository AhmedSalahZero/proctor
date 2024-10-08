<?php

namespace App\Http\Controllers;

use App\Models\Certification;

use Illuminate\Http\Request;

class DownloadSingleCertification extends Controller
{

	public function __invoke($certificationId)
	{
		$certification = Certification::find($certificationId);
		if (!$certification) {
			return redirect()->back()->with('fail', 'No Certification Found !');
		}
		// header('Content-Type: application/pdf');
		\PDF::loadView('backend.emails.certification', [
			'certification' => $certification,
			'student' => $certification->user,
			'public_path' => true,
			'qrcode' => $this->getFrontEndCardQrcode($certification, 75),
			'qrcode2' => $this->getFrontEndCardQrcode($certification, 50)
		], [])->download('Certificate.pdf');
		return redirect()->back();
	}
}
