// Add a contact to an Outlook profile
/**
 *    Script:   addOlContact.js
 *    Purpose:  Add a contact to an Outlook profile
 *    Author:   Daren Thiel
 *    Date:     23 November 1998
 *    Web:      http://www.winscripter.com
 *    Note:     Rename file addOlContact.js
 *              Please refer to the Outlook Visual Basic
 *              help file for information on controlling
 *              Outlook.
 *
 *   	Comments: This script is written using Objects and functions
 *              I can assume that if you are going to use a script
 *              that you will be entering many entries into your contacts
 *              folder and would appreciate the ability to quickly extend
 *              this script to meet your needs.
 *              For Example, you could read an Excel spread sheet of data
 *              and create a large number of entries very quickly.
 **/

/* Outlook Constant for Contact Item */
var olContactItem	= 2;

/** 
 * Create an Object to store the relevant data for our Contact entry.
 * Note: There are a large number of fields that could be entered for
 *       a contact.  I have only selected but a few.  Refer to Outlook
 *       documentation for additional field names.
 **/
function contact( FirstName, LastName, bizPhone, Email, Company, JobTitle ){
	this.FirstName = FirstName;
	this.LastName  = LastName;
	this.bizPhone  = bizPhone;
	this.Email     = Email;
	this.Company   = Company;
	this.JobTitle  = JobTitle;
}

/**
 * Here we create the Outlook Application and ContactItem.
 * Each data element that is stored in our contact object
 * is transfered to the Outlook ContactItem we created.
 * Finally this data is saved.
 **/
function saveContact( obj ){
	/* Create the Outlook Object and Contact Item */
	out = new ActiveXObject( "Outlook.Application" );
	contact = out.CreateItem( olContactItem );

	/* Transfer the data */
	contact.FirstName = obj.FirstName;
	contact.LastName  = obj.LastName;
	contact.BusinessTelephoneNumber = obj.bizPhone;
	contact.Email1Address = obj.Email;
	contact.CompanyName = obj.Company;
	contact.JobTitle = obj.JobTitle;
	
	/* Save the data */
	contact.Save();
}


/* Create a new JScript Object to store data */
newContact = new contact("sFirst", "sLast", "(916) 555-5555", "gjetson@spacely.com", "Sprockets", "JobTitle");

/* Call our own function to save data */
saveContact( newContact );

/* Tell the user we are done */
WScript.Echo("done");







