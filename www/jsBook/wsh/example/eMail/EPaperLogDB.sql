if exists (select * from dbo.sysobjects where id = object_id(N'[dbo].[EmailList1011]') and OBJECTPROPERTY(id, N'IsUserTable') = 1)
drop table [dbo].[EmailList1011]
GO

CREATE TABLE [dbo].[EmailList1011] (
	[SystemSerialNum] [int] IDENTITY (1000, 1) NOT NULL ,
	[MailSentSystemSerialNum] [int] NOT NULL ,
	[Email] [nvarchar] (255) COLLATE Chinese_Taiwan_Stroke_CI_AS NOT NULL ,
	[SentStatus] [nvarchar] (10) COLLATE Chinese_Taiwan_Stroke_CI_AS NOT NULL ,
	[Remark] [ntext] COLLATE Chinese_Taiwan_Stroke_CI_AS NULL ,
	[RecordStatus] [nvarchar] (10) COLLATE Chinese_Taiwan_Stroke_CI_AS NOT NULL ,
	[RecordCreatedDate] [datetime] NOT NULL ,
	[RecordCreatedByPerson] [nvarchar] (50) COLLATE Chinese_Taiwan_Stroke_CI_AS NOT NULL ,
	[RecordModifiedDate] [datetime] NOT NULL ,
	[RecordModifiedByPerson] [nvarchar] (50) COLLATE Chinese_Taiwan_Stroke_CI_AS NOT NULL 
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO

ALTER TABLE [dbo].[EmailList1011] WITH NOCHECK ADD 
	CONSTRAINT [DF_EmailList1011_SentStatus] DEFAULT ('未知') FOR [SentStatus],
	CONSTRAINT [DF_EmailList1011_RecordStatus] DEFAULT ('有效') FOR [RecordStatus],
	CONSTRAINT [PK_EmailList1011] PRIMARY KEY  NONCLUSTERED 
	(
		[SystemSerialNum]
	)  ON [PRIMARY] 
GO

