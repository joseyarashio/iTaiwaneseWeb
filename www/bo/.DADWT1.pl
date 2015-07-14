	use File::copy;
	use File::Find;
	use Cwd;
	$_=sprintf ("%02.f",(localtime)[5]-100);
	$dataday="$dataday$_";
	$_=sprintf ("%02.f",(localtime)[4]);
	$dataday="$dataday$_";
	$_=sprintf ("%02.f",(localtime)[3]);
	$dataday="$dataday$_";
	my $adrs=cwd();
	open(tabh2a,"htmlcode2ascii.txt");
	while(<tabh2a>)
	{
		chomp;
		my @tt=split(/\t/,$_);

		push(@tab1,$tt[0]);
		push(@tab2,$tt[1]);   
		push(@tab3,$tt[3]);
	}
	close(tabh2a);
	
	open(POJ2ForPA,"POJ2ForPA.dic");
	while(<POJ2ForPA>)
	{
		chomp;
		my @tt=split(/\t/,$_);
		#print "$tt[0]\t$tt[1]\n";
		push(@POJ1,$tt[0]);
		push(@FORPA2,$tt[1]);   
	}
	close(POJ2ForPA);
	
	
	open(output,">all-1.log");
	find(\&file,"$adrs\/all");
	close(output);
sub file
{
	my $n=0;  
	my $tone="";
	
	if($_=~/(DADfWT)/gi )
	{
		open(input,$_);
		while(<input>)
		{
			my $POJ="";
			my $FORPA="";
			chomp;
			$_=~s/(<BR>)//g;
			if(/(\<title\>)/)
			{
				my @temp = split(/[\(\)-]/,$_);
				print output "$temp[0] $temp[$#temp]\n";
			}
			if(/(\<pronunciation\>)/)
			{
				my @temp = split(/(<pronunciation>)/,$_);
				print output "<word>";
				for(my $j=0;$j<length($temp[0]);$j++)
				{
					my $letter= substr($temp[0],$j,1);
					if($letter =~ m/\W/ && $letter ne "&" && $n == 1)
					{
						print output "$tone";
						$n=0;
						$tone="";
					}
					
					if(ord($letter)>=127)
					{
						$letter= substr($temp[0],$j,2);
						$j++;
						print output "$letter";
					}
					elsif($letter eq "&")
					{
						$j++;
						my $tp=substr($temp[0],$j,1);
						if ($tp eq "#")
						{
							my $tm;
							$j++;
							$tp=substr($temp[0],$j,1);
							while($tp ne ";")
							{
								#print $tp;
								$tm="$tm$tp";
								$j++;
								$tp=substr($temp[0],$j,1);	
							}
							
							for(my $k=0;$k<=$#tab1;$k++)
							{
								if($tm eq $tab1[$k])
								{
									print output "$tab2[$k]";  
									$tone =  $tab3[$k];
									$n=1;
									$k=$#tab1;
								}
								
							}
							if($n!=1)
							{
								print "$tm\n";
							}
							#print output "[$tm]";
						}
						else
						{
							print output "$letter$tp";
						}
					}
					elsif($letter =~ m/[ptkh]/g && $tone != 8)
					{
						$tone = 4;
						$n=1;
						print output "$letter";
					}
					elsif($letter =~ m/[aeiou]/g && $tone eq "")
					{
						$tone = 1;
						$n=1;
						print output "$letter";
					}
					else
					{
						print output "$letter";
					}
				}
				print output "<\/word>\n";
				
				
				
				print output "<POJ>";
				for(my $j=0;$j<length($temp[2]);$j++)
				{
					my $letter= substr($temp[2],$j,1);
					if($letter =~ m/\W/ && $letter ne "&" && $n == 1)
					{
						if($tone eq "")
						{
							$tone=1;
						}
						print output "$tone";
						$POJ = "$POJ$tone";
						$n=0;
						$tone="";
					}
					
					if($letter eq "&")
					{
						$j++;
						my $tp=substr($temp[2],$j,1);
						if ($tp eq "#")
						{
							my $tm;
							$j++;
							$tp=substr($temp[2],$j,1);
							while($tp ne ";")
							{
								$tm="$tm$tp";
								$j++;
								$tp=substr($temp[2],$j,1);	
							}
							
							for(my $k=0;$k<=$#tab1;$k++)
							{
								if($tm eq $tab1[$k])
								{
									print output "$tab2[$k]";
									$POJ = "$POJ$tab2[$k]";  
									$tone =  $tab3[$k];
									$n=1;
									$k=$#tab1;
								}
							}
							if($n!=1)
							{
								print "$tm\n";
							}
							#print output "[$tm]";
						}
						else
						{
							print output "$letter$tp";
							$POJ = "$POJ$letter$tp";
						}
					}
					elsif($letter =~ m/[ptkh]/g && $tone != 8)
					{
						$tone = 4;
						$n=1;
						print output "$letter";
						$POJ = "$POJ$letter";
					}
					elsif($letter =~ m/[aeiou]/g && $tone eq "")
					{
						$n=1;
						print output "$letter";
						$POJ = "$POJ$letter";
					}
					else
					{
						print output "$letter";
						$POJ = "$POJ$letter";
					}
				}
				print output "<\/POJ>\n";
				
				
				
				print output "<ForPA>";
				#print "$POJ\n";
				for(my $j=0;$j<length($POJ);$j++)
				{
					my $letter= substr($POJ,$j,1);
					if($letter =~ m/\d/)
					{
						if($FORPA eq "")
						{
							print output "$letter";
						}
						else
						{
							for(my $l=0;$l<=$#POJ1;$l++)
							{
								if($FORPA eq $POJ1[$l])
								{
									print output "$FORPA2[$l]";
									$l=$#POJ1;
									$FORPA="";
								}
							}
							if($FORPA ne "")
							{
								print output "$FORPA$letter";
								print "$FORPA\t";
								$FORPA="";
							}
							else
							{
								if($letter =~ m/[135]/)
								{
									print output "$letter";
								}
								elsif($letter == 2)
								{
									print output "4";
								}
								elsif($letter == 4)
								{
									print output "7";
								}
								elsif($letter == 7)
								{
									print output "2";
								}
								elsif($letter == 8)
								{
									print output "6";
								}
							}
						}
						
					}
					elsif($letter =~ m/\w/||$letter =~ m/\*/)
					{
						$letter = lc($letter);
						if($letter eq "o")
						{
							my $on=$j+1;
							my $o= substr($POJ,$on,1);
							if($o eq ".")
							{
								$letter="$letter$o";
								$j++;
							}
						}
						$FORPA="$FORPA$letter";
					}
					elsif($FORPA ne "")
					{
						print output "$FORPA$letter";
						$FORPA="";
					}
					else
					{
						print output "$letter";
					}
				}
				print output "<\/ForPA>\n";
			}
		}
		print output "<\/title>\n";
		close(input);
	}
}