<?php

$ecsid = trim(filter_input(INPUT_POST, 'ecsid'));
$localpart = trim(filter_input(INPUT_POST, 'localpart'));

$errors = 0;

if (!preg_match('/^a0[0-9]{6,6}$/', $ecsid)) {
  $errors += 1;
}
if (!preg_match('/^[a-z]+\.[a-z]+\.[a-z0-9]{3,3}$/', $localpart)) {
  $errors += 2;
}
if ($errors === 0) {
  $file = <<<'EOT'
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
<dict>
	<key>PayloadContent</key>
	<array>
		<dict>
			<key>AutoJoin</key>
			<true/>
			<key>HIDDEN_NETWORK</key>
			<false/>
			<key>PayloadDescription</key>
			<string>ワイヤレス接続設定を構成します。</string>
			<key>PayloadDisplayName</key>
			<string>Wi-Fi（MIAKO）</string>
			<key>PayloadIdentifier</key>
			<string>me.ryota-ka.kyotounivprofile.</string>
			<key>PayloadOrganization</key>
			<string>Ryota Kameoka</string>
			<key>PayloadType</key>
			<string>com.apple.wifi.managed</string>
			<key>PayloadUUID</key>
			<string>81078CC2-BC4E-4D41-8EC7-D3028D34C000</string>
			<key>PayloadVersion</key>
			<integer>1</integer>
			<key>ProxyType</key>
			<string>None</string>
			<key>SSID_STR</key>
			<string>MIAKO</string>
		</dict>
		<dict>
			<key>EmailAccountDescription</key>
			<string>KUMOI</string>
			<key>EmailAccountType</key>
			<string>EmailTypeIMAP</string>
			<key>EmailAddress</key>
			<string>
EOT;
  $file .= $localpart;
  $file .= <<< 'EOT'
@st.kyoto-u.ac.jp</string>
			<key>IncomingMailServerAuthentication</key>
			<string>EmailAuthPassword</string>
			<key>IncomingMailServerHostName</key>
			<string>outlook.office365.com</string>
			<key>IncomingMailServerPortNumber</key>
			<integer>993</integer>
			<key>IncomingMailServerUseSSL</key>
			<true/>
			<key>IncomingMailServerUsername</key>
			<string>
EOT;
  $file .= $ecsid;
  $file .= <<< 'EOT'
@st.kyoto-u.ac.jp</string>
			<key>OutgoingMailServerAuthentication</key>
			<string>EmailAuthPassword</string>
			<key>OutgoingMailServerHostName</key>
			<string>smtp.office365.com</string>
			<key>OutgoingMailServerPortNumber</key>
			<integer>587</integer>
			<key>OutgoingMailServerUseSSL</key>
			<true/>
			<key>OutgoingMailServerUsername</key>
			<string>
EOT;
  $file .= $ecsid;
  $file .= <<< 'EOT'
@st.kyoto-u.ac.jp</string>
			<key>OutgoingPasswordSameAsIncomingPassword</key>
			<true/>
			<key>PayloadDescription</key>
			<string>メールアカウントを構成します。</string>
			<key>PayloadDisplayName</key>
			<string>IMAP アカウント（KUMOI）</string>
			<key>PayloadIdentifier</key>
			<string>me.ryota-ka.kyotounivprofile.メール</string>
			<key>PayloadOrganization</key>
			<string>Ryota Kameoka</string>
			<key>PayloadType</key>
			<string>com.apple.mail.managed</string>
			<key>PayloadUUID</key>
			<string>C7998766-BDE1-4ACA-96B7-67D9FB750F2D</string>
			<key>PayloadVersion</key>
			<integer>1</integer>
			<key>PreventAppSheet</key>
			<false/>
			<key>PreventMove</key>
			<false/>
			<key>SMIMEEnabled</key>
			<false/>
		</dict>
		<dict>
			<key>EAP</key>
			<dict/>
			<key>IPv4</key>
			<dict>
				<key>OverridePrimary</key>
				<integer>1</integer>
			</dict>
			<key>PPP</key>
			<dict>
				<key>AuthName</key>
				<string>
EOT;
  $file .= $ecsid;
  $file .= <<< 'EOT'
</string>
				<key>CCPEnabled</key>
				<integer>1</integer>
				<key>CCPMPPE128Enabled</key>
				<integer>1</integer>
				<key>CCPMPPE40Enabled</key>
				<integer>1</integer>
				<key>CommRemoteAddress</key>
				<string>pptp0.kuins.kyoto-u.ac.jp</string>
			</dict>
			<key>PayloadDescription</key>
			<string>認証を含め、VPN 設定を構成します。</string>
			<key>PayloadDisplayName</key>
			<string>VPN（KUINS-PPTP）</string>
			<key>PayloadIdentifier</key>
			<string>me.ryota-ka.kyotounivprofile.VPN</string>
			<key>PayloadOrganization</key>
			<string>Ryota Kameoka</string>
			<key>PayloadType</key>
			<string>com.apple.vpn.managed</string>
			<key>PayloadUUID</key>
			<string>5F4BC06D-3594-4DEA-9D60-B92978662CB0</string>
			<key>PayloadVersion</key>
			<integer>1</integer>
			<key>Proxies</key>
			<dict>
				<key>ProxyAutoConfigEnable</key>
				<integer>1</integer>
				<key>ProxyAutoConfigURLString</key>
				<string>http://wpad.kuins.net/proxy.pac</string>
			</dict>
			<key>UserDefinedName</key>
			<string>KUINS-PPTP</string>
			<key>VPNType</key>
			<string>PPTP</string>
		</dict>
	</array>
	<key>PayloadDescription</key>
	<string>京都大学学生のための iPhone 構成プロファイルです。Wi-Fi (MIAKO), VPN (KUINS-PPTP), 学生用メール (KUMOI) の設定を一括で行います。</string>
	<key>PayloadDisplayName</key>
	<string>KyotoUnivProfile</string>
	<key>PayloadIdentifier</key>
	<string>me.ryota-ka.kyotounivprofile</string>
	<key>PayloadOrganization</key>
	<string>Ryota Kameoka</string>
	<key>PayloadRemovalDisallowed</key>
	<false/>
	<key>PayloadType</key>
	<string>Configuration</string>
	<key>PayloadUUID</key>
	<string>C3EA112F-3F7B-4C9C-9806-05C8109C8AD9</string>
	<key>PayloadVersion</key>
	<integer>1</integer>
</dict>
</plist>

EOT;

  header('Content-type: application/x-apple-aspen-config; chatset=utf-8');
  header('Content-Disposition: attachment; filename="kyoto_univ_profile_' . $ecsid . '.mobileconfig"');
  echo $file;
} else {
  echo 'invalid values!';
}
