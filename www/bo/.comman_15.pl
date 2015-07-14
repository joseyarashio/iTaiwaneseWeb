	use File::copy;
	use File::Find;
	use Cwd;
	use Audio::Wav;
	$_=sprintf ("%02.f",(localtime)[5]-100);
	$dataday="$dataday$_";
	$_=sprintf ("%02.f",(localtime)[4]);
	$dataday="$dataday$_";
	$_=sprintf ("%02.f",(localtime)[3]);
	$dataday="$dataday$_";
	my $adrs=cwd();
	#print "$dataday\n";
	#open(out,">Combine\/wavfile.log");
	#close(out);
	find(\&file,"$adrs");

	#Combine("$adrs");

sub file
{
	if($_!~/(\.)/gi )
	{
		my $temp = $File::Find::name;
		$temp =~ s/$adrs\///;
		print "perl mspCom2.pl $temp\n";
		system("perl mspCom2.pl $temp"); 
	}
}

sub Combine
{
	my ($ads)=@_;
	
	my $spkn=0;
	my $spt=0;
	my $edt=0;
	my @spk;
	my @edt;
	$edt[0]=0;
	find(\&trs,"$ads\/Combine");
	my $l=10;
	for(my $a=0;$a<$spkn;$a+=$l)
	{
		open(output,">$ads\/Combine\/Combine$a.trs");
		#print "$ads\/Combine\/Combine.trs\n";
		print output "<?xml version=\"1.0\" encoding=\"Big5\"?>\n";
		print output "<!DOCTYPE Trans SYSTEM \"trans-14.dtd\">\n";
		print output "<Trans scribe=\"MSPLAB\" audio_filename=\"MSPLAB\" version=\"1\" version_date=\"$dataday\">\n";
		print output "<Speakers>\n";
		print "$spkn\n";
		if(($a+$l)>$spkn)
		{
			$l=$spkn-$a;
		}
		for(my $i=1;$i<=$l;$i++)
		{
			my $tp=$a+$i;
			print output "<Speaker id=\"spk$i\" name=\"$spk[$tp]\" check=\"no\" dialect=\"native\" accent=\"\" scope=\"local\"/>\n";
		}
		
		print output "<\/Speakers>\n<Episode>\n";
		my $e=$edt[$a+$l]-$edt[$a];
		print output "<Section type=\"report\" startTime=\"0\" endTime=\"$e\">\n";
		for(my $i=1;$i<=$l;$i++)
		{
			my $tp=$a+$i;
			my $j=$tp-1;
			my $s=$edt[$j]-$edt[$a];
			my $e=$edt[$tp]-$edt[$a];
			print output "<Turn startTime=\"$s\" endTime=\"$e\" speaker=\"spk$i\">\n";
			
			open(trs,"$ads\/Combine\/$spk[$tp].trs");
			my @line=<trs>;
			for(my $k=0;$k<=$#line;$k++)
			{
				#print "$#line=\t";
				if($line[$k] =~ /(Sync)/gi)
				{
					my @temp = split(/\"/,$line[$k]); 
					$temp[1] += $s;
					print output "$temp[0]\"$temp[1]\"$temp[2]";
					$k++;
					print output "$line[$k]";
				}
			}
			close(trs);
			print output "<\/Turn>\n";
		}
		print output "<\/Section>\n<\/Episode>\n<\/Trans>";
		close(output);
	}
	$l=10;
	my $wavs = new Audio::Wav;
	my $details = {'bits_sample'  => 16,'sample_rate'  => 16000,'channels' => 1};
	print "spt:0\n";
	my $writes = $wavs -> write( "Combine\/Combine$spt.wav", $details );
	find(\&wav,"$ads\/Combine");
	$writes -> finish();
	
	sub trs
	{
		my $fs = -s "$_";
		if(/(\.trs)/gi && $_ !~ /(Combine)/ && $fs > 1000)
		{
			$spkn++;
			open(trs,$_);
			my @line=<trs>;
			my @temp = split(/\"/,$line[4]);
			$spk[$spkn]=$temp[3];
			@temp = split(/\"/,$line[8]);
			#$temp[3]=sprintf ("%.5f",$temp[3]);
			$edt=$edt+$temp[3];
			$edt[$spkn]=$edt;
			close(trs);
		}
	}
	sub wav
	{
		my $fs = -s "$_";
		if(/(\.wav)/gi && $_!~/(Combine)/ && $fs > 44)
		{
			if($spt % $l ==0 && $spt!=0)
			{

				$writes -> finish();
				$wavs = new Audio::Wav;
				$details = {'bits_sample'  => 16,'sample_rate'  => 16000,'channels' => 1};
				$writes = $wavs -> write( "$ads\/Combine\/Combine$spt.wav", $details );

			}
			print "$_\n";
			my $wav = new Audio::Wav;
			my $read = $wav -> read( "$_" );###
			my $details = $read -> details();
			my %out_details = map { $_ => $details -> {$_} } 'bits_sample', 'sample_rate','channels';
			my $Bps = ($out_details{bits_sample}*$out_details{sample_rate})/8;
			if($Bps ne 0)
			{
				my $size = -s "$_";
				$size = $size-44;
			
				my $sec = ($size/$Bps)/$out_details{channels};
				defined( $data = $read -> read_raw( $size+44 ) ); 
				$writes -> write_raw( $data );
				$spt++;
			}
			else
			{
				print "$_ bad\n";
			}
		}
	}
}
