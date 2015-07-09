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
if ($errors !== 0) {
  echo 'invalid values!';
  exit($errors);
}

header('Content-type: application/x-apple-aspen-config; chatset=utf-8');
header('Content-Disposition: attachment; filename="kyodairaku2' . $ecsid . '.mobileconfig"');
?>    

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
<dict>
	<key>PayloadContent</key>
	<array>
		<dict>
			<key>SSID_STR</key>
			<string>KUINS-Air</string>
			<key>HIDDEN_NETWORK</key>
			<false/>
			<key>AutoJoin</key>
			<true/>
            <key>EncryptionType</key>
			<string>WPA</string>
			<key>PayloadDescription</key>
			<string>ワイヤレス接続設定を構成します。</string>
			<key>PayloadDisplayName</key>
			<string>Wi-Fi（KUINS-Air）</string>
			<key>PayloadIdentifier</key>
			<string>jp.ac.kyoto-u.iimc.rd.www.conf-air</string>
			<key>PayloadOrganization</key>
			<string>ICT D&amp;I Office, IIMC, Kyoto University</string>
			<key>PayloadType</key>
			<string>com.apple.wifi.managed</string>
			<key>PayloadUUID</key>
			<string>AEBBCB20-B0F5-4BD8-B3AA-E467A1510D5D</string>
			<key>PayloadVersion</key>
			<integer>1</integer>
			<key>ProxyType</key>
			<string>Auto</string>
			<key>ProxyPACURL</key>
			<string>http://wpad.kuins.net/proxy.pac</string>
            <key>EAPClientConfiguration</key>                                  
			<dict>
			  <key>UserName</key>
			  <string><?=$ecsid?></string>
			  <key>AcceptEAPTypes</key>
			  <array>
				<integer>25</integer>
			  </array>
			  <key>PayloadCertificateAnchorUUID</key>
			  <string>034AE5DD-9456-40FB-81E5-8F3B8EF0F9EC</string>
			  <key>TLSTrustedServerNames</key>
				  <array>
					<string>kuins.kyoto-u.ac.jp</string>
				  </array>
			</dict>
		</dict>
		<dict>
		  <key>PayloadType</key>
		  <string>com.apple.security.pem</string>
		  <key>PayloadUUID</key>
		  <string>034AE5DD-9456-40FB-81E5-8F3B8EF0F9EC</string>
		  <key>PayloadCertificateFileName</key>
		  <string>rad.kuins.kyoto-u.ac.jp.cer</string>
		  <key>PayloadIdentifier</key>
		  <string>jp.ac.kyoto-u.iimc.rd.www.conf-cert</string>
		  <key>PayloadDescription</key>
		  <string>KUINS-Airネットワークの安全な接続を保守する証明書です</string>
		  <key>PayloadDisplayName</key>
		  <string>KUINS-Air Radiusサーバ証明書</string>
		  <key>PayloadVersion</key>
		  <integer>1</integer>
		  <key>PayloadContent</key>
		  <data>
			MIIFDDCCA/SgAwIBAgIIcq/T54dBVNcwDQYJKoZIhvcNAQELBQAwbTELMAkGA1UE
			BhMCSlAxEDAOBgNVBAcTB0FjYWRlbWUxKjAoBgNVBAoTIU5hdGlvbmFsIEluc3Rp
			dHV0ZSBvZiBJbmZvcm1hdGljczEgMB4GA1UEAxMXTklJIE9wZW4gRG9tYWluIENB
			IC0gRzQwHhcNMTUwNjExMDQ0MjA2WhcNMTcwNzExMDQ0MjA2WjCBnTELMAkGA1UE
			BhMCSlAxEDAOBgNVBAcTB0FjYWRlbWUxGTAXBgNVBAoTEEt5b3RvIFVuaXZlcnNp
			dHkxPzA9BgNVBAsTNkt5b3RvIFVuaXZlcnNpdHkgSW50ZWdyYXRlZCBJbmZvcm1h
			dGlvbiBOZXR3b3JrIFN5c3RlbTEgMB4GA1UEAxMXcmFkLmt1aW5zLmt5b3RvLXUu
			YWMuanAwggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQC8WjPZMJjxFe9U
			shRGljR888dXVo59q59SuGlTuTxPRZj85/obUGBhHOQQgsBIXpbJsDQULaCN7lcE
			srpZH13Saefhg1yND9WMROw0rJKItW0Qi57cvRxjk3m9IjZRDsRl6eczl0I7cK06
			qPhg8uBn7lbBDRVdJ/VXvAFyMNaZAOfYWtNcyfMf5/oc6dXyWQCjDG+pl9iPRkmO
			ngJvAHzsX4AmvmjxMKzQ2+MaQg75KhV7O4SHK+rC9pT63nWMGrnGyUW+4fxyjV6r
			54iQ13XfyYRyI894h536gp/ZdMQ28MKJXTBd99UcoFA6uU2sHXMsXPhxhRunxuUH
			6HwqHcYJAgMBAAGjggF9MIIBeTAdBgNVHSUEFjAUBggrBgEFBQcDAQYIKwYBBQUH
			AwIwHwYDVR0jBBgwFoAUGQtvOR8xAzRf5NJAHzfmjediOXwwSgYDVR0fBEMwQTA/
			oD2gO4Y5aHR0cDovL3JlcG8xLnNlY29tdHJ1c3QubmV0L3NwcGNhL25paS9vZGNh
			My9mdWxsY3JsZzQuY3JsMA4GA1UdDwEB/wQEAwIFoDAdBgNVHQ4EFgQUm4fIXvou
			wCTFoaPAFrVr1MQmkoEwWgYDVR0gBFMwUTBPBgwrBgEEAYH8CAMCAQEwPzA9Bggr
			BgEFBQcCARYxaHR0cHM6Ly9yZXBvMS5zZWNvbXRydXN0Lm5ldC9zcGNwcC9jcHMv
			aW5kZXguaHRtbDA8BggrBgEFBQcBAQQwMC4wLAYIKwYBBQUHMAGGIGh0dHA6Ly9u
			aWlnNC5vY3NwLnNlY29tdHJ1c3QubmV0MCIGA1UdEQQbMBmCF3JhZC5rdWlucy5r
			eW90by11LmFjLmpwMA0GCSqGSIb3DQEBCwUAA4IBAQAY0GJSgR9CanqDMTaK9IcF
			Nb1JkE5JykqGgwHLWt6OXdwUg7ZayDCKJEhN2veiPYF1EyLPKZ2lzwdW3W0wJVnr
			Cvi0fQ6nXqdxL902Ke2HziXu36mtTr+7Zrsnqm7dNOVhI/JFLQsbCUS+yR9AbzHY
			GLY6c4ExkFn9iyi6dyTaVsZQC1bO9gUN/uLZbsGk4Jlbwd6pCI/j8FtVYn2g/NP+
			tfhxWKLCRdEb8behJXvxv226XKWnrhnUoNqoUbGHUwfaAuvioDR3I9g2OSZckaLb
			vDJe8EtidKsO+vB1GlWnPeLTvKS2qTeCJC+X40bQVSQYwUgTRWc8HGoZtqsyEYMJ
		  </data>
		</dict>
		<dict>
			<key>EmailAccountDescription</key>
			<string>KUMail</string>
			<key>EmailAccountType</key>
			<string>EmailTypeIMAP</string>
			<key>EmailAddress</key>
			<string><?=$localpart?>@kyoto-u.ac.jp</string>
			<key>IncomingMailServerAuthentication</key>
			<string>EmailAuthPassword</string>
			<key>IncomingMailServerHostName</key>
			<string>mail.iimc.kyoto-u.ac.jp</string>
			<key>IncomingMailServerPortNumber</key>
			<integer>993</integer>
			<key>IncomingMailServerUseSSL</key>
			<true/>
			<key>IncomingMailServerUsername</key>
			<string><?=$ecsid?></string>
			<key>OutgoingMailServerAuthentication</key>
			<string>EmailAuthPassword</string>
			<key>OutgoingMailServerHostName</key>
			<string>mail.iimc.kyoto-u.ac.jp</string>
			<key>OutgoingMailServerPortNumber</key>
			<integer>465</integer>
			<key>OutgoingMailServerUseSSL</key>
			<true/>
			<key>OutgoingMailServerUsername</key>
			<string><?=$ecsid?></string>
			<key>OutgoingPasswordSameAsIncomingPassword</key>
			<true/>
			<key>PayloadDescription</key>
			<string>メールアカウントを構成します。</string>
			<key>PayloadDisplayName</key>
			<string>IMAP アカウント（KUMail）</string>
			<key>PayloadIdentifier</key>
			<string>jp.ac.kyoto-u.iimc.rd.www.conf-kumail</string>
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
				<string><?=$ecsid?></string>
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
			<string>jp.ac.kyoto-u.iimc.rd.www.conf-pptp</string>
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
	<string>jp.ac.kyoto-u.iimc.rd.www.conf</string>
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
