CREATE DEFINER=`grdbuser`@`192.168.%.%` PROCEDURE `sp3Report`(
SSite text,
SCallID int(11),
SCallType text,
SCampaign text,
SLocation text,
SCallerNo int(11),
SSkill text,
SCallDate text,
SStartTime text,
STimetoAnswer text,
SEndTime text,
STalkTime text,
SHoldTime text,
SDuration text,
SCallFlow int(11),
SDialedNumber bigint(20),
SAgent text,
SDisposition text,
SWrapupDuration text,
SHandlingTime text,
SStatus text,
SDialStatus text,
SCustomerDialStatus text,
SAgentDialStatus text,
SHangupBy text,
STransferDetails text,
SUUI text,
Scomments text
)
BEGIN

if(SELECT count(*) FROM S3_Report_AutoMans  WHERE CallID=SCallID) = 0 then
		INSERT INTO S3_Report_AutoMans(Site, CallID, CallType, Campaign, Location, CallerNo, Skill, 
        CallDate,StartTime,TimetoAnswer,EndTime,TalkTime,HoldTime,Duration,CallFlow,DialedNumber,
        Agent,Disposition,WrapupDuration,HandlingTime,Status,DialStatus,CustomerDialStatus,AgentDialStatus,
        HangupBy,TransferDetails,UUI,comments) 
		VALUES(SSite, SCallID, SCallType, SCampaign, SLocation, SCallerNo, SSkill,
        SCallDate,SStartTime,STimetoAnswer,SEndTime,STalkTime,SHoldTime,SDuration,SCallFlow,SDialedNumber,
        SAgent,SDisposition,SWrapupDuration,SHandlingTime,SStatus,SDialStatus,SCustomerDialStatus,SAgentDialStatus,
        SHangupBy,STransferDetails,SUUI,Scomments);
        
	select '1' as result;
else
	select '0' as result;
 end if;

END