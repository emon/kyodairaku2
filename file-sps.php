<?php

$ecsid = trim(filter_input(INPUT_POST, 'ecsid'));
$localpart = trim(filter_input(INPUT_POST, 'localpart'));

$errors = 0;

if (!preg_match('/^[a-z]+[0-9]{3,3}[a-z]+$/', $ecsid)) {
  $errors += 1;
}
if (!preg_match('/^[a-z]+\.[a-z]+\.[a-z0-9]{2,2}$/', $localpart)) {
  $errors += 2;
}
if ($errors === 0) {
  $file = <<<EOT
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
			<string>Wi-Fi（KUINS-Air）</string>
			<key>PayloadIdentifier</key>
			<string>jp.ac.kyoto-u.iimc.rd.www.</string>
			<key>PayloadOrganization</key>
			<string>ICT D&amp;I Office, IIMC, Kyoto University</string>
			<key>PayloadType</key>
			<string>com.apple.wifi.managed</string>
			<key>PayloadUUID</key>
			<string>AEBBCB20-B0F5-4BD8-B3AA-E467A1510D5D</string>
			<key>PayloadVersion</key>
			<integer>1</integer>
			<key>ProxyType</key>
			<string>None</string>
			<key>SSID_STR</key>
			<string>KUINS-Air</string>
            <key>EncryptionType</key>
			<string></string> 
		</dict>
		<dict>
			<key>EmailAccountDescription</key>
			<string>KUMail</string>
			<key>EmailAccountType</key>
			<string>EmailTypeIMAP</string>
			<key>EmailAddress</key>
			<string>${localpart}@kyoto-u.ac.jp</string>
			<key>IncomingMailServerAuthentication</key>
			<string>EmailAuthPassword</string>
			<key>IncomingMailServerHostName</key>
			<string>mail.iimc.kyoto-u.ac.jp</string>
			<key>IncomingMailServerPortNumber</key>
			<integer>993</integer>
			<key>IncomingMailServerUseSSL</key>
			<true/>
			<key>IncomingMailServerUsername</key>
			<string>${ecsid}</string>
			<key>OutgoingMailServerAuthentication</key>
			<string>EmailAuthPassword</string>
			<key>OutgoingMailServerHostName</key>
			<string>mail.iimc.kyoto-u.ac.jp</string>
			<key>OutgoingMailServerPortNumber</key>
			<integer>465</integer>
			<key>OutgoingMailServerUseSSL</key>
			<true/>
			<key>OutgoingMailServerUsername</key>
			<string>${ecsid}</string>
			<key>OutgoingPasswordSameAsIncomingPassword</key>
			<true/>
			<key>PayloadDescription</key>
			<string>メールアカウントを構成します。</string>
			<key>PayloadDisplayName</key>
			<string>IMAP アカウント（KUMail）</string>
			<key>PayloadIdentifier</key>
			<string>jp.ac.kyoto-u.iimc.rd.www.</string>
			<key>PayloadOrganization</key>
			<string>ICT D&amp;I Office, IIMC, Kyoto University</string>
			<key>PayloadType</key>
			<string>com.apple.mail.managed</string>
			<key>PayloadUUID</key>
			<string>4FB7D839-BA57-47E2-9C7B-F96BAC4F52D7</string>
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
				<string>${ecsid}</string>
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
			<string>jp.ac.kyoto-u.iimc.rd.www.</string>
			<key>PayloadOrganization</key>
			<string>ICT D&amp;I Office, IIMC, Kyoto University</string>
			<key>PayloadType</key>
			<string>com.apple.vpn.managed</string>
			<key>PayloadUUID</key>
			<string>7C1B2F19-CAA4-4263-AD56-ABCF96CC3D8A</string>
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
	<string>京都大学教職員のためのiPhone 構成プロファイルです。Wi-Fi (KUINS-Air), VPN (KUINS-PPTP), 全学メール (KUMail) の設定を一括で行います。</string>
	<key>PayloadDisplayName</key>
	<string>京大ラクラク設定ツール for iOS / OS X</string>
	<key>PayloadIdentifier</key>
	<string>jp.ac.kyoto-u.iimc.rd.www.</string>
	<key>PayloadOrganization</key>
	<string>ICT D&amp;I Office, IIMC, Kyoto University</string>
	<key>PayloadRemovalDisallowed</key>
	<false/>
	<key>PayloadType</key>
	<string>Configuration</string>
	<key>PayloadUUID</key>
	<string>C64F3EE5-687D-4B2D-8B1B-997C259E4C76</string>
	<key>PayloadVersion</key>
	<integer>1</integer>
</dict>
</plist>
EOT;

  header('Content-type: application/x-apple-aspen-config; chatset=utf-8');
  header('Content-Disposition: attachment; filename="kyodairaku2' . $ecsid . '.mobileconfig"');
  echo $file;
} else {
  echo 'invalid values!';
}
