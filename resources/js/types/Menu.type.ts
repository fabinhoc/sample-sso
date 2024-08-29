interface TranslateLabelType {
  key: string;
  plural?: number | null;
}

export interface MenuType {
  label: TranslateLabelType;
  icon: string;
  url: string;
  routeName: string;
}
