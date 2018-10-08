<?php

function SignupSend($email, $username, $password){

		// $from = array('office@apadvocates.com' => 'AP Advocates');
		Yii::$app->mailer->compose()
			->setTo('muhamadadinugraha@gmail.com')
			->setFrom('office@apadvocates.com')
			->setSubject('#Registration')
			->setHtmlBody('
				<div bgcolor="#FFFFFF" style="font-family:Helvetica Neue,Helvetica,Helvetica,Arial,sans-serif;width:100%!important;min-height:100%;font-size:14px;color:#404040;margin:0;padding:0">
					
					<table style="font-family:Helvetica Neue,Helvetica,Helvetica,Arial,sans-serif;max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0" bgcolor="transparent">
						<tbody>
							<tr style="margin:0;padding:0">
								<td style="margin:0;padding:0"></td>
								<td style="display:block!important;max-width:600px!important;clear:both!important;margin:0 auto;padding:0">
									<div style="max-width:600px;display:block;border-collapse:collapse;margin:0 auto;padding:0;border:0 solid #e7e7e7">
										<table bgcolor="#fff" style="font-family:Helvetica Neue,Helvetica,Helvetica,Arial,sans-serif;max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0">
											<tbody>
												<tr style="margin:0;padding:0">
													<td height="4" bgcolor="#eeb211" style="background-color: #57b150!important;line-height:4px;font-size:4px;margin:0;padding:0;">&nbsp;</td>
													<td height="4" bgcolor="#d50f25" style="background-color: #ff4141!important;line-height:4px;font-size:4px;margin:0;padding:0;">&nbsp;</td>
													<td height="4" bgcolor="#3369E8" style="background-color: #2196F3!important;line-height:4px;font-size:4px;margin:0;padding:0;">&nbsp;</td>
												</tr>
											</tbody>
										</table>
									</div>
								</td>
								<td style="margin:0;padding:0"></td>
							</tr>
						</tbody>
					</table>
					<table style="font-family:Helvetica Neue,Helvetica,Helvetica,Arial,sans-serif;max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0" bgcolor="transparent">
						<tbody>
							<tr style="margin:0;padding:0">
								<td style="margin:0;padding:0"></td>
								<td bgcolor="#FFFFFF" style="display:block!important;max-width:600px!important;clear:both!important;margin:0 auto;padding:0">
									<div style="max-width:600px;display:block;border-collapse:collapse;margin:0 auto;padding:30px 15px;border:1px solid #e7e7e7">
										<table style="font-family:Helvetica Neue,Helvetica,Helvetica,Arial,sans-serif;max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0" bgcolor="transparent">
											<tbody>
												<tr style="margin:0;padding:0">
													<td style="margin:0;padding:0">
														<h4 style="font-family:HelveticaNeue-Light,Helvetica Neue Light,Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;line-height:1.1;color:#000;font-weight:500;font-size:23px;margin:0 0 20px;padding:0">Bergabung dengan AP Advocates</h4>
														<p style="font-weight:normal;font-size:14px;line-height:1.6;margin:0 0 20px;padding:0">Hi '.$username.',</p>
				
														<div style="text-align:center;margin:20px;padding:0" align="center">														
														</div>
														
														<p style="font-weight:normal;font-size:14px;line-height:1.6;border-top-style:solid;border-top-color:#d0d0d0;border-top-width:3px;margin:40px 0 0;padding:10px 0 0">
															<small style="color:#999;margin:0;padding:0">
															Email ini dibuat secara otomatis. Mohon tidak mengirimkan balasan ke email ini.
															</small>
														</p>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</td>
								<td style="margin:0;padding:0"></td>
							</tr>
						</tbody>
					</table>
					<table style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;clear:both!important;background-color:transparent;margin:0 0 60px;padding:0" bgcolor="transparent">
						<tbody>

							<tr style="margin:0;padding:0">
								<td style="margin:0;padding:0"></td>
								<td style="display:block!important;max-width:600px!important;clear:both!important;margin:0 auto;padding:0">
									<div style="max-width:600px;display:block;border-collapse:collapse;margin:0 auto;padding:20px 15px;border-color:#e7e7e7;border-style:solid;border-width:0 1px 1px">
										<table width="100%" style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0" bgcolor="transparent">
											<tbody style="margin:0;padding:0">
												<tr style="margin:0;padding:0">
													<td valign="top" style="margin:0;padding:0 10px 0 0;width:75%">

													</td>
													<td valign="top" style="margin:0;padding:0">
														<span style="font-size:12px;margin-bottom:6px;display:inline-block">Ikuti Kami</span>
														<div style="text-align:left">
															<a href="" style="color:#008000;display:inline-block" target="_blank" data-saferedirecturl=""><img style="border:0" src="https://ci6.googleusercontent.com/proxy/agHTGv3hPBwqEPQdwExINI_EdApQWN9TOO2-ONzF9zF1rt-pqbOnharrh6oHkfUZmFHRGNRYPWQsFUG2mTs-VVMXOXt5gRtdGUlEn-9jf63-St4seQufYENwTEWTKXP4YaQge-thlQ=s0-d-e1-ft#https://i9.createsend1.com/static/eb/master/13-the-blueprint-3/images/twitter.png" width="26" height="26" class="CToWUd"></a>
															<a href="" style="color:#008000;display:inline-block" target="_blank" data-saferedirecturl=""><img style="border:0" src="https://ci6.googleusercontent.com/proxy/ZPmsZVllPjnBVF8B9Bf4M5NQUwlpG5HLHwGhmvGM9O4zPzq8nvBt0jkrQ0AblJt0EzJiNfXgP1bhTFcFdmxBVteEbYuIzW6zWH33ENSRZ-F816aFAPOOYVPr_xvXopxZaV2OgmJcVTN2=s0-d-e1-ft#https://i1.createsend1.com/static/eb/master/13-the-blueprint-3/images/instagram.png" width="26" height="26" class="CToWUd"></a>
															<a href="" style="color:#008000;display:inline-block" target="_blank" data-saferedirecturl=""><img style="border:0" src="https://ci5.googleusercontent.com/proxy/1YnmsDQYXLgS_XTQueN_9BsFprPCPcad_5Yx8GgGkCoeAmCkPNh1_1ppIj3xzDKerLDEtVKxdja_2UIA7LgpF7tpcp--KIJ5PFxUWoyedd_7o_YwwthoW-f_oTkRxannMGa5UQMU2BQ=s0-d-e1-ft#https://i2.createsend1.com/static/eb/master/13-the-blueprint-3/images/linkedin.png" width="26" height="26" class="CToWUd"></a>

														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</td>
								<td style="margin:0;padding:0"></td>
							</tr>

						</tbody>
					</table>
				</div>
			')
			->send();
	}

?>