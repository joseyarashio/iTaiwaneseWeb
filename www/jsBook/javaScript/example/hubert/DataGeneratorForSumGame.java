
/**
 * Generate a javascript array structure, so it can be used for the Sum game.
 * The algorithm is used described in viewdata.html.
 * 
 * @author HubertGee
 */
public class DataGeneratorForSumGame {
	static double[][][] optimumScores;
	static int[][][][] bestChoices;
	static int maxNums = 4; //default value
	static int thresholdValue = 170; //default value

	/**
	 * Computes the optimum scores and the best choice and puts the data into two arrays.
	 */
	public void compute() {
		int filledTens; //# number of filled tens positions
		int filledOnes; //# number of filled ones positions
		int currentSum; //sum of points so far
		
		optimumScores = new double[maxNums+1][maxNums+1][thresholdValue+1];
		bestChoices = new int[maxNums+1][maxNums+1][thresholdValue+1][7];
		
		//set initial values
		for (filledTens = 0; filledTens <= maxNums; filledTens++) {
			recusiveFunction(filledTens, 0, 0);
		}
		for (filledOnes = 0; filledOnes <= maxNums; filledOnes++) {
			recusiveFunction(0, filledOnes, 0);
		}
		for (currentSum = 0; currentSum <= thresholdValue; currentSum++) {
			recusiveFunction(0, 0, currentSum);
		}
		
		//start computing from the initial values
		for (filledTens = 0; filledTens <= maxNums; filledTens++) {
			for (filledOnes = 0; filledOnes <= maxNums; filledOnes++) {
				for (currentSum = 0; currentSum <= thresholdValue; currentSum++) {
					recusiveFunction(filledTens, filledOnes, currentSum); // start computation
				}
			}
		}
		return;
	}
	
	/**
	 * @param filledTens # number of filled tens positions
	 * @param filledOnes # number of filled ones positions
	 * @param currentSum sum of points so far
	 * @return optimum score so far
	 */
	public double recusiveFunction (int filledTens, int filledOnes, int currentSum) {
		
//		if (filledTens == 0 && filledOnes == 0)
//			return currentSum;
		if (currentSum < 0)
			return 0; //???
		if (currentSum >= thresholdValue)
			return 0;
		if (filledTens == maxNums && filledOnes == maxNums)
			return currentSum;
		//i need more base conditions???
		
		double optimumScore = optimumScores[filledTens][filledOnes][currentSum];
		
		if (optimumScore != 0) //if the optimumScore already exists, return value
			return optimumScore;
		
		double maxRoll1 = 0, maxRoll2 = 0, maxRoll3 = 0, 
			maxRoll4 = 0, maxRoll5 = 0, maxRoll6 = 0;
		
		maxRoll1 = recusiveFunctionHelper (filledTens, filledOnes, currentSum, 1);
		maxRoll2 = recusiveFunctionHelper (filledTens, filledOnes, currentSum, 2);
		maxRoll3 = recusiveFunctionHelper (filledTens, filledOnes, currentSum, 3);
		maxRoll4 = recusiveFunctionHelper (filledTens, filledOnes, currentSum, 4);
		maxRoll5 = recusiveFunctionHelper (filledTens, filledOnes, currentSum, 5);
		maxRoll6 = recusiveFunctionHelper (filledTens, filledOnes, currentSum, 6);		
		
		optimumScore = (maxRoll1 + maxRoll2 + maxRoll3 + 
						maxRoll4 + maxRoll5 + maxRoll6)/6;
		
		optimumScores[filledTens][filledOnes][currentSum] = optimumScore;
		//record optimumScore in optimumScore table
		return optimumScore;
	}
	
	/**
	 * @param filledTens # number of filled tens positions
	 * @param filledOnes # number of filled ones positions
	 * @param currentSum sum of points so far
	 * @param roll current dice roll
	 * @return optimum score so far 
	 */
	public double recusiveFunctionHelper (int filledTens, int filledOnes, int currentSum, int roll) {
		double higherScore = 0;
		double tensPos = 0, onesPos = 0;
		
		if (filledTens == 0)
			tensPos = roll*10; //???
		else 
			tensPos = recusiveFunction(filledTens-1, filledOnes, currentSum-(roll*10));
		
		if (filledOnes == 0)
			onesPos = roll; //???
		else 
			onesPos = recusiveFunction(filledTens, filledOnes-1, currentSum-roll);
		
		higherScore = Math.max(tensPos, onesPos);
		if (higherScore == tensPos) {
			if (filledTens != maxNums) {
				if (!((roll*10)+currentSum > thresholdValue && (filledTens != maxNums)))
					bestChoices[filledTens][filledOnes][currentSum][roll] = 10; 
			} else { 
				if (!((roll)+currentSum > thresholdValue && (filledOnes != maxNums)))
					bestChoices[filledTens][filledOnes][currentSum][roll] = 1;
			}
			
		} else { 
			if (filledOnes != maxNums) {
				if (!((roll)+currentSum > thresholdValue && (filledOnes != maxNums)))
					bestChoices[filledTens][filledOnes][currentSum][roll] = 1;
			} else {
				if (!((roll*10)+currentSum > thresholdValue && (filledTens != maxNums)))
					bestChoices[filledTens][filledOnes][currentSum][roll] = 10;
			}

		}
		
		return higherScore;
	}
	
	/**
	 * Main method to generate a javascript array structure, so it can be used for the Sum game.
	 */
	public static void main(String[] args) {	
		DataGeneratorForSumGame cal = new DataGeneratorForSumGame();
		//maxNums = 2; //override default value
		//thresholdValue = 100; //override default value
		
		cal.compute();
		System.out.println("var maxNums = " + maxNums+";");
		System.out.println("var thresholdValue = " + thresholdValue+";");
		// print array tables
		System.out.print("var optimumScores = [");
		for (int i = 0; i < optimumScores.length; i++) {
			System.out.print("[");
			for (int j = 0; j < optimumScores[i].length; j++) {
//				System.out.print("m="+i+" n="+j+" ");
				System.out.print("[");
				for (int k = 0; k < optimumScores[i][j].length; k++) {
					System.out.print(Math.floor(optimumScores[i][j][k]*100)/100);
					if ((k+1) < optimumScores[i][j].length)
						System.out.print(", ");
				}
				System.out.print("]");
				if ((j+1) < optimumScores[i].length)
					System.out.print(", ");				
				System.out.println();
			}
			System.out.print("]");
			if ((i+1) < optimumScores.length)
				System.out.print(", ");
			System.out.println();
		}
		System.out.println("];");
		
		System.out.print("var bestChoices = [");
		for (int i = 0; i < bestChoices.length; i++) {
			System.out.print("[");
			for (int j = 0; j < bestChoices[i].length; j++) {
				System.out.print("[");
				for (int k = 0; k < bestChoices[i][j].length; k++) {
					System.out.print("[");
//					System.out.print("m="+i+" n="+j+" s="+k+" ");
					for (int l = 0; l < bestChoices[i][j][k].length; l++) {
						System.out.print(Math.floor(bestChoices[i][j][k][l]));
						if ((l+1) < bestChoices[i][j][k].length)
							System.out.print(", ");
					}
					System.out.print("]");
					if ((k+1) < bestChoices[i][j].length)
						System.out.print(", ");
					System.out.println();
				}
				System.out.print("]");
				if ((j+1) < bestChoices[i].length)
					System.out.print(", ");
				System.out.println();
			}
			System.out.print("]");
			if ((i+1) < bestChoices.length)
				System.out.print(", ");
			System.out.println();
		}
		System.out.println("];");
	}
}
