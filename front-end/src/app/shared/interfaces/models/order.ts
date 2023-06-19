export interface Order{
  "@id" ?:string; //le typage des variables pour la securité
  id: number;
  reference: string;
  paid_at:Date;
  payment_id:number
  amount:string;
}
